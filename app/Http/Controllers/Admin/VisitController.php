<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Vite;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visits = Visit::with('student','servant')->get();
        return view('admin.visit.index', compact('visits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select(['id','name'])->get();
        return view('admin.visit.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Visit::create($request->all());
        return redirect()->route('admin.visit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $visit = Visit::with('student','servant')->find($id);
        return  view('admin.visit.show', compact('visit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $visit = Visit::with('student','servant')->find($id);
        $users =  User::select(['id','name'])->whereNot('id', $visit->servant_id)->whereNot('id', $visit->student_id)->get();
        return view('admin.visit.edit', compact('visit','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visit $visit)
    {
        $visit->update($request->all());
        return redirect()->route('admin.visit.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visit $visit)
    {
        if ($visit) $visit->delete();
        return redirect()->route('admin.visit.index');
    }
}
