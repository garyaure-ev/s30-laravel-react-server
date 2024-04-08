<?php

namespace App\Repositories;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Role;
use App\Models\User;
use Exception;

class UserRepository implements UserRepositoryInterface {
    public function list($role_id = null): UserCollection {
        if ((!empty($role_id)) && (is_numeric($role_id))) return new UserCollection(Role::findOrFail($role_id)->users()->orderBy('full_name')->get());
        return new UserCollection(User::orderBy('full_name')->get());
    }
    public function store($data) {
        if (User::where('email', $data['email'])->exists()) throw new Exception("User with the same email address already exists, please check the input data.");
        $user = User::create(['email' => $data['email'], 'full_name' => $data['full_name']]);
        $user->syncRoles($data['roles']);
        return new UserResource($user);
    }
    public function update($data, User $user) {
        $user->email = $data['email'];
        $user->full_name = $data['full_name'];
        $user->save();
        $user->syncRoles($data['roles']);
        return new UserResource($user);
    }
    public function show(User $user) {
        return new UserResource($user);
    }
    public function delete(User $user) {
        return $user->delete();
    }
}