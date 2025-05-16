<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prefix;
use Illuminate\Http\Request;

class PrefixController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-prefixes|create-prefixes|edit-prefixes|delete-prefixes', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-prefixes', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-prefixes', ['only' => ['edit']]);
        $this->middleware('permission:delete-prefixes', ['only' => ['destroy']]);
    }

    public function index()
    {

        $prefixes = Prefix::paginate(10);
        return view('admin.prefixes.index', compact('prefixes'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.prefixes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'az_prefix'=>'required',
            'en_prefix'=>'required',
            'ru_prefix'=>'required',
        ]);

        Prefix::create([
            'az'=>[
                'prefix'=>$request->az_prefix,
                'value'=>$request->az_value,
            ],
            'en'=>[
                'prefix'=>$request->en_prefix,
                'value'=>$request->en_value,
            ],
            'ru'=>[
                'prefix'=>$request->ru_prefix,
                'value'=>$request->ru_value,
            ]
        ]);

        return redirect()->route('prefixes.index')->with('message','Prefix added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Prefix $prefix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prefix $prefix)
    {

        return view('admin.prefixes.edit', compact('prefix'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Prefix $prefix)
    {

        $request->validate([
            'az_prefix'=>'required',
            'en_prefix'=>'required',
            'ru_prefix'=>'required'
        ]);

        $prefix->update( [
            'is_active' =>$request->is_active,
            'az'=>[
                'prefix'=>$request->az_prefix,
                'value'=>$request->az_value,
            ],
            'en'=>[
                'prefix'=>$request->en_prefix,
                'value'=>$request->en_value,
            ],
            'ru'=>[
                'prefix'=>$request->ru_prefix,
                'value'=>$request->ru_value,
            ]

        ]);

        return redirect()->back()->with('message','Prefix updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prefix $prefix)
    {

        $prefix->delete();
        return redirect()->route('prefixes.index')->with('message', 'Prefix deleted successfully');

    }
}
