<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register_submit(RegisterRequest $request)
    {

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->save();

        Auth::login($user);

        return redirect()->route('home');

    }

    public function login_submit(LoginRequest $request)
    {
        // Verify reCAPTCHA response
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $secretKey = env('RECAPTCHA_SECRET_KEY');

        $recaptchaVerifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
        $response = file_get_contents($recaptchaVerifyUrl . '?secret=' . $secretKey . '&response=' . $recaptchaResponse);
        $responseKeys = json_decode($response, true);

        if (!$responseKeys['success']) {
            return redirect()->back()->withErrors(['captcha' => 'Please complete the reCAPTCHA.']);
        }

        // Attempt login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        } else {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'password' => ['Şifrə yanlışdır'],
            ]);
            throw $error;
        }
    }


    public function logout()
    {

        Auth::logout();

        return redirect()->route('login');

    }
}
