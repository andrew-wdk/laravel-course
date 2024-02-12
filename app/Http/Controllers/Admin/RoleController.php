<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleStoreRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Create the controller instance.
     */
    // public function __construct()
    // {
    //     $this->authorizeResource(Role::class, 'role');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $this->authorize('roles_view');

        $roles = Role::get();

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('roles_create');

        $permissions = Permission::pluck('name', 'id');

        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreRequest $request)
    {
        $role = Role::create($request->only('name'));
        $role->permissions()->attach($request->permission_ids);

        return redirect()->route('admin.role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $this->authorize('roles_view');

        return view('admin.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $this->authorize('roles_edit');

        $permissions = Permission::pluck('name', 'id');
        $role_permission_ids = $role->permissions->pluck('id')->toArray();

        return view('admin.role.edit', compact('role', 'permissions', 'role_permission_ids'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleStoreRequest $request, Role $role)
    {
        $role->update($request->only('name'));
        $role->permissions()->sync($request->permission_ids);

        return redirect()->route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $this->authorize('roles_delete');

        $role?->delete();

        return redirect()->route('admin.role.index');
    }
}
