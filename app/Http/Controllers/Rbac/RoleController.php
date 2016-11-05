<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Requests\Rbac\RoleRequest;
use App\Models\Rbac\Permission;
use App\Models\Rbac\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Zizaco\Entrust\EntrustRole;

class RoleController extends Controller
{

    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        // middleware will be here
    }

    /**
     * Get all roles
     *
     * @return mixed
     */
    public function roles()
    {
        $roles = EntrustRole::all();
        return $roles;
    }

    /**
     * @param RoleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());
        return response()->json(['message' => 'Role was created successfully!', 'role' => $role]);
    }

    /**
     * @param RoleRequest $request
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->display_name = $request->input('display_name');
        $role->description  = $request->input('description');
        $role->save();

        return response()->json(['message' => 'Role was updated successfully!', 'role' => $role]);
    }

    /**
     * @return array
     */
    public function rolesPermissions()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        $board = [];

        foreach($roles as $role)
        {
            foreach ($permissions as $perm)
                $board[$role->name][$perm->name] = $role->hasPermission( $perm->name );
        }

        return compact('roles', 'permissions', 'board');
    }

    /**
     * @param Request $request
     * @param Role $role
     * @param Permission $perm
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function updateRolePermission(Request $request, Role $role, Permission $perm)
    {
        $role->hasPermission($perm->name) ?
            $role->detachPermission( $perm ) : $role->attachPermission( $perm );

        return response()->json(['message' => 'Roles permission was successfully updated!']);
    }


}
