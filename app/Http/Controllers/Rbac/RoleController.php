<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Requests\Rbac\RoleRequest;
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

    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());
        return response()->json(['message' => 'Role was created successfully!', 'role' => $role]);
    }

}
