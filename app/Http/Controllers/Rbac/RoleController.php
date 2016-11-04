<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Requests\Rbac\RoleRequest;
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
        $role = new EntrustRole();

        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        return response()->json(['message' => 'Role was created successfully!', 'role' => $role]);
    }

}
