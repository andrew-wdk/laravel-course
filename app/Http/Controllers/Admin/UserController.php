<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $this->authorize('viewAny', User::class);
        // gets data from database
        // associative array key = posts , value = data
        // $data['posts'] = Post::get();
        $users = User::with('lastVisit','servants')->get();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        $servants = User::role('servant')->select(['id', 'name'])->get();
        return view('admin.user.create', compact('roles','servants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
       // dd($request->all());
        $user = User::create($request->all());
        $user->assignRole($request->role_id);
        $user->servants()->attach($request->servants ?? []);
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('servants')->find($id);
        return view('admin.user.show' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with('servants')->find($id);
        $servants = User::role('servant')->select(['id', 'name'])->get();
        $roles = Role::pluck('name', 'id');
        return view('admin.user.edit', compact('servants','roles','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->assignRole($request->role_id);
        $user->servants()->syncWithoutDetaching($request->servants ?? []);
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user) $user->delete();
        return redirect()->route('admin.user.index');
    }
}
