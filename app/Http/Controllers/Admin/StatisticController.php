<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-statistics|create-statistics|edit-statistics|delete-statistics', ['only' => ['index','show']]);
        $this->middleware('permission:create-statistics', ['only' => ['create','store']]);
        $this->middleware('permission:edit-statistics', ['only' => ['edit']]);
        $this->middleware('permission:delete-statistics', ['only' => ['destroy']]);
    }

    public function index()
    {

        $statistics = Statistic::paginate(10);
        return view('admin.statistics.index', compact('statistics'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'az_title'=>'required',
            'en_title'=>'required',
            'ru_title'=>'required',
            'az_description'=>'required',
            'en_description'=>'required',
            'ru_description'=>'required',
        ]);

        Statistic::create([
            'az'=>[
                'title'=>$request->az_title,
                'description'=>$request->az_description,
            ],
            'en'=>[
                'title'=>$request->en_title,
                'description'=>$request->en_description,
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'description'=>$request->ru_description,
            ]
        ]);

        return redirect()->route('statistics.index')->with('message','Statistic added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Statistic $statistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statistic $statistic)
    {

        return view('admin.statistics.edit', compact('statistic'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Statistic $statistic)
    {

        $request->validate([
            'az_title'=>'required',
            'en_title'=>'required',
            'ru_title'=>'required',
            'az_description'=>'required',
            'en_description'=>'required',
            'ru_description'=>'required',
        ]);

        $statistic->update( [

            'is_active'=> $request->is_active,
            'az'=>[
                'title'=>$request->az_title,
                'description'=>$request->az_description,
            ],
            'en'=>[
                'title'=>$request->en_title,
                'description'=>$request->en_description,
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'description'=>$request->ru_description,
            ]

        ]);

        return redirect()->back()->with('message','Statistic updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistic $statistic)
    {

        $statistic->delete();
        return redirect()->route('statistics.index')->with('message', 'Statistic deleted successfully');

    }
}
