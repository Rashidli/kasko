<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-links|create-links|edit-links|delete-links', ['only' => ['index','show']]);
        $this->middleware('permission:create-links', ['only' => ['create','store']]);
        $this->middleware('permission:edit-links', ['only' => ['edit']]);
        $this->middleware('permission:delete-links', ['only' => ['destroy']]);
    }
    function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
//        $count = Link::whereTranslation('title', $title)->count();
//
//        if ($count > 0) {
//            $slug .= '-' . $count;
//        }

        return $slug;
    }

    public function index()
    {

        $links = Link::paginate(10);
        return view('admin.links.index', compact('links'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.links.create');
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
            'description'=>'required',
        ]);

        Link::create([
            'description'=>$request->description,

            'az'=>[
                'title'=>$request->az_title,
                'meta_title'=>$request->az_meta_title,
                'meta_description'=>$request->az_meta_description,
                'meta_keywords'=>$request->az_meta_keywords,
                'slug'=>$this->generateUniqueSlug($request->az_title),
            ],
            'en'=>[
                'title'=>$request->en_title,
                'meta_title'=>$request->en_meta_title,
                'meta_description'=>$request->en_meta_description,
                'meta_keywords'=>$request->en_meta_keywords,
                'slug'=>$this->generateUniqueSlug($request->en_title),
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'meta_title'=>$request->ru_meta_title,
                'meta_description'=>$request->ru_meta_description,
                'meta_keywords'=>$request->ru_meta_keywords,
                'slug'=>$this->generateUniqueSlug($request->ru_title),
            ]

        ]);

        return redirect()->route('links.index')->with('message','Link added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {

        return view('admin.links.edit', compact('link'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Link $link)
    {

        $request->validate([
            'az_title'=>'required',
            'en_title'=>'required',
            'ru_title'=>'required',
            'description'=>'required',
        ]);

        $link->update( [

            'description'=>$request->description,
            'is_active'=> $request->is_active,

            'az'=>[
                'title'=>$request->az_title,
                'meta_title'=>$request->az_meta_title,
                'meta_description'=>$request->az_meta_description,
                'meta_keywords'=>$request->az_meta_keywords,
                'slug'=>$this->generateUniqueSlug($request->az_title),
            ],
            'en'=>[
                'title'=>$request->en_title,
                'meta_title'=>$request->en_meta_title,
                'meta_description'=>$request->en_meta_description,
                'meta_keywords'=>$request->en_meta_keywords,
                'slug'=>$this->generateUniqueSlug($request->en_title),
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'meta_title'=>$request->ru_meta_title,
                'meta_description'=>$request->ru_meta_description,
                'meta_keywords'=>$request->ru_meta_keywords,
                'slug'=>$this->generateUniqueSlug($request->ru_title),
            ]

        ]);

        return redirect()->back()->with('message','Link updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {

        $link->delete();
        return redirect()->route('links.index')->with('message', 'Link deleted successfully');

    }
}
