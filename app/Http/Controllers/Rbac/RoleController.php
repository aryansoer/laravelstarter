<?php

namespace App\Http\Controllers\Rbac;

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

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|unique:roles|max:255',
            'display_name'  => 'required|max:255',
        ]);

        return $request->all();
    }

}
