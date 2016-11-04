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
        return $request->all();
    }

}
