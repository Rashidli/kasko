<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShareIcon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShareIconController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-share_icons|create-share_icons|edit-share_icons|delete-share_icons', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-share_icons', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-share_icons', ['only' => ['edit']]);
        $this->middleware('permission:delete-share_icons', ['only' => ['destroy']]);
    }

    public function index()
    {
        $share_icons = ShareIcon::paginate(10);
        return view('admin.share_icons.index', compact('share_icons'));
    }

    public function create()
    {
        return view('admin.share_icons.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'link' => 'required',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
        }

        ShareIcon::create([
            'title' => $request->title,
            'image'=>  $filename,
            'link' => $request->link,
        ]);

        return redirect()->route('share_icons.index')->with('message', 'ShareIcon added successfully');

    }

    public function show(ShareIcon $share_icon)
    {
        //
    }

    public function edit(ShareIcon $share_icon)
    {
        return view('admin.share_icons.edit', compact('share_icon'));
    }


    public function update(Request $request, ShareIcon $share_icon)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable',
            'link' => 'required',
        ]);

        if($request->hasFile('image')){

            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
            $share_icon->image = $filename;
        }

        $share_icon->update([
            'title' => $request->title,
            'link' => $request->link,
            'is_active' => $request->is_active,
        ]);

        return redirect()->back()->with('message', 'ShareIcon updated successfully');
    }

    public function destroy(ShareIcon $share_icon)
    {
        $share_icon->delete();
        return redirect()->route('share_icons.index')->with('message', 'ShareIcon deleted successfully');
    }
}
