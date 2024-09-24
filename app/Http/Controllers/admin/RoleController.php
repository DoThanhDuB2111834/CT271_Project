<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\role\CreateRole;
use App\Http\Requests\role\UpdateRole;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $role;
    protected $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role->all();

        return view('admin/role/index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = $this->permission->all()->groupBy('group');

        return view('admin/role/create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRole $request)
    {
        $dataCreate = $request->all();
        $dataCreate['guard_name'] = 'web';

        $role = $this->role->create($dataCreate);
        $role->givePermissionTo($dataCreate['permission_names']);

        return redirect()->route(route: 'role.index')->with(['message' => 'Create successfully', 'state' => 'success']);
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
        $role = $this->role->with('permissions')->findOrFail($id);
        $permissions = $this->permission->all()->groupBy('group');
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRole $request, string $id)
    {
        $dataUpdate = $request->all();

        $role = $this->role->findOrFail($id);
        $role->update($dataUpdate);
        $role->syncPermissions($dataUpdate['permission_names'] ?? []);

        return redirect()->route(route: 'role.index')->with(['message' => 'Update successfully', 'state' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = $this->role->findOrFail($id);

        $role->delete();
        return redirect()->route(route: 'role.index')->with(['message' => 'Delete successfully', 'state' => 'success']);
    }
}
