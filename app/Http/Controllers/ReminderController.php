<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Http\Requests\ReminderRequest;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reminders = Reminder::all();
        return view('reminders.index', compact('reminders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reminders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReminderRequest $request)
    {
        Reminder::create($request->validated());
        return redirect()->route('reminders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reminder $reminder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reminder $reminder)
    {
        return view('reminders.edit', compact('reminder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReminderRequest $request, Reminder $reminder)
    {
        $reminder->update($request->validated());
        return redirect()->route('reminders.index', $reminder);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reminder $reminder)
    {
        $reminder->delete();
        return redirect()->route('reminders.index');
    }
}
