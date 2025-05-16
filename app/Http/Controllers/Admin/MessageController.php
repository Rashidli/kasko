<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\MessageSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:list-working_hours|create-working_hours|edit-working_hours|delete-working_hours', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-working_hours', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-working_hours', ['only' => ['edit']]);
        $this->middleware('permission:delete-working_hours', ['only' => ['destroy']]);
    }

    public function index()
    {

        $schedules = MessageSchedule::all();
        return view('admin.messages.index', compact('schedules'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        MessageSchedule::query()->delete();

        foreach ($request->schedules as $schedule) {
            if (isset($schedule['day']) && $schedule['day'] !== 'none') {
                MessageSchedule::create([
                    'message_id' => $request->message_id,
                    'day' => $schedule['day'],
                    'start_time' => $schedule['start_time'],
                    'end_time' => $schedule['end_time'],
                ]);
            }
        }

        return redirect()->route('messages.index')->with('message', 'İş saatları dəyişdirildi');
    }


    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {

        return view('admin.messages.edit', compact('message'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Message $message)
    {
        try {
            $request->validate([
                'az_title' => 'required',
                'en_title' => 'required',
                'ru_title' => 'required',
                'az_description' => 'required',
                'en_description' => 'required',
                'ru_description' => 'required',
                'schedules.*.day' => 'required|in:none,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
                'schedules.*.start_time' => 'nullable',
                'schedules.*.end_time' => 'nullable',
            ]);

            // Update message details
            $message->update([
                'is_active' => $request->is_active,
                'az' => [
                    'title' => $request->az_title,
                    'description' => $request->az_description,
                ],
                'en' => [
                    'title' => $request->en_title,
                    'description' => $request->en_description,
                ],
                'ru' => [
                    'title' => $request->ru_title,
                    'description' => $request->ru_description,
                ],
            ]);


            $message->schedules()->delete();


            foreach ($request->schedules as $schedule) {
                if (isset($schedule['day']) && $schedule['day'] !== 'none') {
                    $message->schedules()->create([
                        'day' => $schedule['day'],
                        'start_time' => $schedule['start_time'],
                        'end_time' => $schedule['end_time'],
                    ]);
                }
            }
        }catch (\Exception $exception){
            return $exception->getMessage();
        }

        return redirect()->back()->with('message', 'Message updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {

        $message->delete();
        return redirect()->route('messages.index')->with('message', 'Message deleted successfully');

    }
}
