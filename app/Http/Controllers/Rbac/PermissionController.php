<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Requests\Rbac\PermissionRequest;
use App\Models\Rbac\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{

    /**
     * @param PermissionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PermissionRequest $request)
    {
        $permission = Permission::create($request->all());
        return response()->json(['message' => 'Permission was created successfully!', 'permission' => $permission]);
    }
}
