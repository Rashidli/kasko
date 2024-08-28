<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FormSubmission;
use App\Models\Service;
use Illuminate\Http\Request;

class FormSubmissionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:list-form_submissions|create-form_submissions|edit-form_submissions|delete-form_submissions', ['only' => ['index','show']]);
        $this->middleware('permission:create-form_submissions', ['only' => ['create','store']]);
        $this->middleware('permission:edit-form_submissions', ['only' => ['edit']]);
        $this->middleware('permission:delete-form_submissions', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category = Category::with('services')->findOrFail($request->category_id);

        $query = FormSubmission::whereHas('form.service.category', function ($query) use ($request) {
            $query->where('id', $request->category_id);
        });

        if ($request->filled('service_id')) {
            $query->whereHas('form.service', function ($query) use ($request) {
                $query->where('id', $request->service_id);
            });
        }

        if ($request->filled('name')) {
            $name = strtolower($request->name);
            $query->whereRaw('LOWER(data) like ?', ["%{$name}%"]);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $limit = $request->filled('limit') ? $request->limit : 10;

        $formSubmissions = $query->orderBy('created_at','desc')->paginate($limit);

        return view('admin.form_submissions.index', compact('formSubmissions', 'category'));
    }

    public function update(Request $request, $id)
    {
        $formSubmission = FormSubmission::findOrFail($id);

        $request->validate([
            'status' => 'required',
            'note' => 'nullable',
        ]);

        $formSubmission->status = $request->status;
        $formSubmission->note = $request->note;
        $formSubmission->save();

        return redirect()->route('form_submissions.show', $formSubmission->id)
            ->with('message', 'Mesaj updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormSubmission $formSubmission)
    {
        return view('admin.form_submissions.show', compact('formSubmission'));
    }

    public function destroy(FormSubmission $formSubmission)
    {
        $formSubmission->delete();
        return redirect()->back();
    }
}
