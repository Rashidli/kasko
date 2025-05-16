<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::query()
            ->when($request->filled('name'), fn ($q) => $q->name($request->name))
            ->when($request->filled('email'), fn ($q) => $q->email($request->email))
            ->when($request->filled('phone'), fn ($q) => $q->phone($request->phone))
            ->orderBy('id', 'desc')->paginate(15);

        return view('admin.customers.index', compact('customers'));
    }
}
