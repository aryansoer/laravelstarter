<?php

namespace App\Models\Rbac;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable = ['name', 'display_name', 'description'];

    public function getRouteKeyName()
    {
        return 'id';
    }
}
