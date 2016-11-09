<?php

namespace App\Http\Controllers\Rbac;

use App\Events\UserCreated;
use App\Http\Requests\Rbac\UserRequest;
use App\Models\Rbac\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'is_admin'  => 1,
            'created_by'=> $request->user()->id,
            'password'  => $this->defaultPassword()
        ]);

        event(new UserCreated($user));

        return response()->json(['message' => 'User was created successfully!', 'user' => $user]);
    }

    private function defaultPassword()
    {
        return bcrypt(config('app.key'));
    }

    /**
     * @return array
     */
    public function usersRoles()
    {
        $roles = Role::all();
        $users = User::admin()->get();

        $board = [];

        foreach($roles as $role)
        {
            foreach ($users as $user) {
                $board[$role->name][$user->email] = $user->hasRole($role->name);
            }
        }

        return compact('roles', 'users', 'board');
    }

    /**
     * @param Request $request
     * @param User $user
     * @param Role $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserRole(Request $request, User $user, Role $role)
    {
        $user->hasRole($role->name) ?
            $user->detachRole( $role ) : $user->attachRole( $role );

        return response()->json(['message' => 'Users role was successfully updated!']);
    }
}
