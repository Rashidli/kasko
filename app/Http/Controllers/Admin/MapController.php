<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-maps|create-maps|edit-maps|delete-maps', ['only' => ['index','show']]);
        $this->middleware('permission:create-maps', ['only' => ['create','store']]);
        $this->middleware('permission:edit-maps', ['only' => ['edit']]);
        $this->middleware('permission:delete-maps', ['only' => ['destroy']]);
    }

    public function index()
    {

        $maps = Map::paginate(10);
        return view('admin.maps.index', compact('maps'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.maps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'map'=>'required',
        ]);

        Map::create([
            'map'=> $request->map,
        ]);

        return redirect()->route('maps.index')->with('message','Map added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Map $map)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Map $map)
    {

        return view('admin.maps.edit', compact('map'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Map $map)
    {

        $request->validate([
            'map'=>'required',
        ]);

        $map->update( [

            'map'=> $request->map,

        ]);

        return redirect()->back()->with('message','Map updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Map $map)
    {

        $map->delete();
        return redirect()->route('maps.index')->with('message', 'Map deleted successfully');

    }
}
