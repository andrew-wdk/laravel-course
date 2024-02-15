<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meetings = Meeting::orderByDesc('id')->get();

        return view('admin.meeting.index', compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::role('student')->select(['id', 'name'])->get();
        return  view('admin.meeting.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $meeting = Meeting::create($request->all());

        $meeting->attendance()->attach($request->attendance ?? []);

        return redirect()->route('admin.meeting.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $meeting = Meeting::with('attendance')->find($id);
        return  view('admin.meeting.show', compact('meeting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $meeting = Meeting::with('attendance')->find($id);
        $users = User::role('student')->select(['id', 'name'])->get();
        return  view('admin.meeting.edit', compact('users', 'meeting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meeting $meeting)
    {
        $meeting->update($request->all());
        $meeting->attendance()->syncWithoutDetaching($request->attendance);
        return redirect()->route('admin.meeting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meeting $meeting)
    {
        if ($meeting) $meeting->delete();
        return redirect()->route('admin.meeting.index');
    }
}
