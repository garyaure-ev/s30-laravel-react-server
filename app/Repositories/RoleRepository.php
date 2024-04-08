<?php

namespace App\Repositories;

use App\Http\Resources\RoleCollection;
use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface {
    public function list() {
        return new RoleCollection(Role::orderBy('name')->get());
    }
}