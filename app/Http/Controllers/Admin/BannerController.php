<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-banners|create-banners|edit-banners|delete-banners', ['only' => ['index','show']]);
        $this->middleware('permission:create-banners', ['only' => ['create','store']]);
        $this->middleware('permission:edit-banners', ['only' => ['edit']]);
        $this->middleware('permission:delete-banners', ['only' => ['destroy']]);
    }

    public function index()
    {

        $banners = Banner::paginate(10);
        return view('admin.banners.index', compact('banners'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if($request->hasFile('banner')){
            $file = $request->file('banner');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
        }

        Banner::create([
            'banner'=>  $filename,
            'link'=>  $request->link,
        ]);

        return redirect()->route('banners.index')->with('message','Banner added successfully');

    }

    /**
     * Display the specified resource.
     */

    public function show(Banner $banners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {

        return view('admin.banners.edit', compact('banner'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Banner $banner)
    {

        if($request->hasFile('banner')){

            $file = $request->file('banner');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
            $banner->banner = $filename;

        }
        $banner->update([
            'link'=>  $request->link,
            'is_active'=>  $request->is_active,
        ]);

        return redirect()->back()->with('message','Banner updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {

        $banner->delete();
        return redirect()->route('banners.index')->with('message', 'Banner deleted successfully');

    }
}
