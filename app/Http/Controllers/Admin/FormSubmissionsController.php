<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SubmissionsExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FormSubmission;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

        $query = FormSubmission::query()->whereHas('form.service.category', function ($query) use ($request) {
            $query->where('id', $request->category_id);
        }) ->with(['order_logs' => function ($q) {
            $q->latest()->limit(1);
        }]);

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

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        $limit = $request->filled('limit') ? $request->limit : 10;

        $formSubmissions = $query->orderByDesc('created_at')->paginate($limit)->withQueryString();
        $order_statuses = OrderStatus::all();
        return view('admin.form_submissions.index', compact(
            'formSubmissions',
            'category','order_statuses'
        ));
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

        return redirect()->route('form_submissions.show', ['form_submission' => $formSubmission->id] + request()->query())
            ->with('message', 'Mesaj updated successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(FormSubmission $formSubmission)
    {
//        $formSubmission = FormSubmission::with(['order_logs' => function ($q) {
//            $q->latest()->limit(1);
//        }])->findOrFail($formSubmission->id);
        $order_statuses = OrderStatus::all();
        return view('admin.form_submissions.show', compact('formSubmission','order_statuses'));
    }

    public function destroy(FormSubmission $formSubmission)
    {
        $formSubmission->delete();
        return redirect()->route('form_submissions.index',['category_id' => $formSubmission->form?->service?->category] + request()->query())
            ->with('message', 'Silindi');
    }

    public function exportSubmissionsToExcel(Request $request)
    {
        $query = FormSubmission::query();

        if ($request->filled('category_id')) {
            $query->whereHas('form.service.category', function ($query) use ($request) {
                $query->where('id', $request->category_id);
            });
        }

        if ($request->filled('service_id')) {
            $query->whereHas('form.service', function ($query) use ($request) {
                $query->where('id', $request->service_id);
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $formSubmissions = $query->orderBy('created_at', 'desc')->get();

        return Excel::download(new SubmissionsExport($formSubmissions), 'submissions.xlsx');
    }

}
