<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserRoleController extends Controller
{
    protected $role;
    protected $user;

    protected $permission;

    public function __construct(Role $role, User $user, Permission $permission)
    {
        $this->role = $role;
        $this->user = $user;
        $this->permission = $permission;
    }

    public function index()
    {
        $users = $this->user->all();

        return view('admin.UserRole.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->role->all();

        $permissions = $this->permission->all()->groupBy('group');

        return view('admin.UserRole.create', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\password::defaults()],
        ]);

        $roles = $request->input('roles') ?? [];
        $permissions = $request->input('permissions') ?? [];

        $user = User::create(['email' => $request->email, 'password' => Hash::make($request->password), 'email_verified_at' => Carbon::now(),]);

        $user->assignRole($roles);
        $user->givePermissionTo($permissions);

        event(new Registered($user));

        return redirect()->route(route: 'UserRole.index')->with(['message' => 'Create successfully', 'state' => 'success']);
    }

    public function edit(string $id)
    {
        $user = $this->user->find($id);

        $roles = $this->role->all();

        $permissions = $this->permission->all()->groupBy('group');

        return view('admin.UserRole.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, string $id)
    {
        $user = $this->user->find($id);

        $roles = $request->input('roles') ?? [];
        $permissions = $request->input('permissions') ?? [];

        $user->syncRoles($roles);
        $user->syncPermissions($permissions);


        return redirect()->route(route: 'UserRole.index')->with(['message' => 'Create successfully', 'state' => 'success']);
    }

    public function findUserWithRole(string $role)
    {
        $result = [];

        $users = $this->user->all();

        if ($role == 'all') {
            foreach ($users as $user) {
                if ($user->hasRole($role) || true) {
                    array_push($result, $user);
                }
            }
            return response()->json(['success' => true, 'users' => $users], 200);
        }

        foreach ($users as $user) {
            if ($user->hasRole($role)) {
                array_push($result, $user);
            }
        }

        return response()->json(['success' => true, 'users' => $result], 200);
    }
}
