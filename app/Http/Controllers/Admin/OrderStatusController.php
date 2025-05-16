<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-order_statuses|create-order_statuses|edit-order_statuses|delete-order_statuses', ['only' => ['index','show']]);
        $this->middleware('permission:create-order_statuses', ['only' => ['create','store']]);
        $this->middleware('permission:edit-order_statuses', ['only' => ['edit']]);
        $this->middleware('permission:delete-order_statuses', ['only' => ['destroy']]);
    }

    public function index()
    {

        $order_statuses = OrderStatus::paginate(10);
        return view('admin.order_statuses.index', compact('order_statuses'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.order_statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required|max:255',
            'value'=>'required|max:255|unique:order_statuses,value',
            'color'=>'nullable|max:255',
        ]);

        OrderStatus::create([
            'title'=> $request->title,
            'value'=> $request->value,
            'color'=> $request->color,
        ]);

        return redirect()->route('order_statuses.index')->with('message','OrderStatus added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(OrderStatus $order_status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderStatus $order_status)
    {

        return view('admin.order_statuses.edit', compact('order_status'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, OrderStatus $order_status)
    {

        try {
            $request->validate([

                'title'=>'required|max:255',
                'value'=>'required|max:255|unique:order_statuses,value', $order_status->id,
                'color'=>'nullable|max:255',

            ]);

            $order_status->update( [

                'title'=> $request->title,
                'value'=> $request->value,
                'color'=> $request->color,

            ]);

            return redirect()->back()->with('message','OrderStatus updated successfully');
        }catch (\Exception $exception){
            return $exception->getMessage();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderStatus $order_status)
    {

        $order_status->delete();
        return redirect()->route('order_statuses.index')->with('message', 'OrderStatus deleted successfully');

    }
}
