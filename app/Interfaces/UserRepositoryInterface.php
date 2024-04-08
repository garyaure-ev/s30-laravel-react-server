<?php
namespace App\Interfaces;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;

interface UserRepositoryInterface {
    public function list($role_id = null);
    public function store($data);
    public function update($data, User $user);
    public function show(User $user);
    public function delete(User $user);
}