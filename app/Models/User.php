<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'email',
        'full_name',
    ];

    public function roles(): BelongsToMany {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function syncRoles(array $role_ids) {
        UserRole::where('user_id', $this->id)->whereNotIn('role_id', $role_ids)->delete();
        foreach($role_ids as $role_id) {
            UserRole::firstOrCreate([
                'user_id' => $this->id,
                'role_id' => $role_id
            ]);
        }
    }
}
