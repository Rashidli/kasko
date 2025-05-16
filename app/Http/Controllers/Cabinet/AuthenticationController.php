<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Prefix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function showLoginForm()
    {
        return view('cabinet.auth.login');
    }

    public function cabinetDashboard()
    {
        return view('cabinet.welcome');
    }

    public function showRegisterForm()
    {
        $prefixes = Prefix::all();

        return view('cabinet.auth.register', compact('prefixes'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'           => 'nullable|string|max:255',
            'surname'        => 'nullable|string|max:255',
            'email'          => 'required|string|email|max:255|unique:customers',
            'fin_code'       => 'required|string|size:7|unique:customers',
            'phone'          => 'required|string|max:20',
            'prefix'         => 'required',
            'privacy_policy' => 'required',
            'password'       => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&#]/',
            ],
        ], [
            'email.required'          => 'Email daxil edilməlidir.',
            'privacy_policy.required' => 'Qaydalar və Şərtlər seçilməlidir.',
            'email.email'             => 'Düzgün email formatı daxil edin.',
            'email.unique'            => 'Bu email artıq istifadə olunub.',
            'fin_code.required'       => 'FİN kod daxil edilməlidir.',
            'fin_code.size'           => 'FİN kod 7 simvoldan ibarət olmalıdır.',
            'fin_code.unique'         => 'Bu FİN kod artıq istifadə olunub.',
            'phone.required'          => 'Telefon nömrəsi daxil edilməlidir.',
            'prefix.required'         => 'Telefon prefiksi seçilməlidir.',
            'password.required'       => 'Şifrə daxil edilməlidir.',
            'password.min'            => 'Şifrə ən azı 8 simvol olmalıdır.',
            'password.regex'          => 'Şifrə ən azı bir böyük hərf, bir kiçik hərf, bir rəqəm və bir xüsusi simvol içərməlidir.',
        ]);

        $fullPhone        = $request->prefix . $request->phone;
        $existingCustomer = Customer::where('phone', $fullPhone)->exists();

        if ($existingCustomer) {
            return back()->withErrors(['phone' => 'Bu telefon nömrəsi artıq istifadə olunub.'])->withInput();
        }

        $customer = Customer::create([
            'name'     => $request->name,
            'surname'  => $request->surname,
            'email'    => $request->email,
            'fin_code' => $request->fin_code,
            'phone'    => $fullPhone,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('customer')->login($customer);

        return redirect()->route('cabinet.welcome')->with('success', 'Qeydiyyat uğurla tamamlandı! Zəhmət olmasa daxil olun.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|string',
            'password' => 'required|string',
        ]);

        $user = Customer::where('email', $request->email)
            ->orWhere('phone', $request->email)
            ->orWhere('fin_code', $request->email)
            ->first();

        if ($user && Auth::guard('customer')->attempt(['email' => $user->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        throw ValidationException::withMessages([
            'email' => ['Daxil edilən məlumatlar səhfdir.'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
