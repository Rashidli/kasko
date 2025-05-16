<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Insurance;
use Illuminate\Http\Request;

class PropertyInsuranceController extends Controller
{
    public function index()
    {
        $insurances = Insurance::with(['property', 'insuredPerson', 'operator'])
            ->latest()
            ->get();

        return view('admin.property.index', compact('insurances'));
    }

    public function show($id)
    {
        $insurance = Insurance::with(['customer', 'property', 'insuredPerson', 'operator'])
            ->findOrFail($id);

        return view('admin.property.show', compact('insurance'));
    }

}
