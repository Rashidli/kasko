<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct(protected ImageUploadService $imageUploadService)
    {
        $this->middleware('permission:list-abouts|create-abouts|edit-abouts|delete-abouts', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-abouts', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-abouts', ['only' => ['edit']]);
        $this->middleware('permission:delete-abouts', ['only' => ['destroy']]);
    }

    public function index()
    {
        $abouts = About::with('translations')->paginate(10);

        return view('admin.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'az_title'       => 'required',
            'en_title'       => 'required',
            'ru_title'       => 'required',
            'az_short_title' => 'required',
            'en_short_title' => 'required',
            'ru_short_title' => 'required',
            'az_description' => 'required',
            'en_description' => 'required',
            'ru_description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $filename = $this->imageUploadService->upload($request->file('image'));
        }

        About::create([
            'image' => $filename,
            'az'    => [
                'title'       => $request->az_title,
                'short_title' => $request->az_short_title,
                'description' => $request->az_description,
                'img_alt'     => $request->az_img_alt,
                'img_title'   => $request->az_img_title,
            ],
            'en' => [
                'title'       => $request->en_title,
                'short_title' => $request->en_short_title,
                'description' => $request->en_description,
                'img_alt'     => $request->en_img_alt,
                'img_title'   => $request->en_img_title,
            ],
            'ru' => [
                'title'       => $request->ru_title,
                'short_title' => $request->ru_short_title,
                'description' => $request->ru_description,
                'img_alt'     => $request->ru_img_alt,
                'img_title'   => $request->ru_img_title,
            ],
        ]);

        return redirect()->route('abouts.index')->with('message', 'About added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about): void {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'az_title'       => 'required',
            'en_title'       => 'required',
            'ru_title'       => 'required',
            'az_description' => 'required',
            'en_description' => 'required',
            'ru_description' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $about->image = $this->imageUploadService->upload($request->file('image'));
        }
        $about->update([
            'is_active' => $request->is_active,
            'az'        => [
                'title'       => $request->az_title,
                'short_title' => $request->az_short_title,
                'description' => $request->az_description,
                'img_alt'     => $request->az_img_alt,
                'img_title'   => $request->az_img_title,
            ],
            'en' => [
                'title'       => $request->en_title,
                'short_title' => $request->en_short_title,
                'description' => $request->en_description,
                'img_alt'     => $request->en_img_alt,
                'img_title'   => $request->en_img_title,
            ],
            'ru' => [
                'title'       => $request->ru_title,
                'short_title' => $request->ru_short_title,
                'description' => $request->ru_description,
                'img_alt'     => $request->ru_img_alt,
                'img_title'   => $request->ru_img_title,
            ],
        ]);

        return redirect()->back()->with('message', 'About updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about->delete();

        return redirect()->route('abouts.index')->with('message', 'About deleted successfully');
    }
}
