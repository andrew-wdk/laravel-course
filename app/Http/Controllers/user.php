<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;

class user extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // gets data from database
        // associative array key = posts , value = data
        // $data['posts'] = Post::get();
        $users= ModelsUser::get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ModelsUser::create($request->all());

        // $post = new Post();
        // $post->title = $request->title;
        // $post->body = $request->body;

        // $post->save();


        return redirect(url('post'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
