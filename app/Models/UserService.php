<?php

namespace App\Models;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserService
{
    
    private $role;
    public function __construct(User $user, Role $role)
    {
    
        $this->role = $role;
    }
    

    public function getRole()
    {
        return $this->role->pluck('name', 'name')->all();
    }
    public function checkrole($id)
    {
        $user = $this->user->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')->join('roles', 'roles.id', '=', 'model_has_roles.role_id')->select('roles.name')->where('users.id', $id)->get();
        return $user;
    }

    
}
