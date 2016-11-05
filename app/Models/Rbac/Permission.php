<?php

namespace App\Models\Rbac;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{

    public function getRouteKeyName()
    {
        return 'id';
    }
}
