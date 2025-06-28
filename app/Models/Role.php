<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'name',
        'guard_name',
        'description',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions');
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'model', 'model_has_roles');
    }

   /**
     * Check if the role has a specific permission.
     */
    public function hasPermissionTo($permission): bool
    {
        $permissionName = is_string($permission) ? $permission : $permission->name;
        if($permissionName == 'Super Admin'){

            return true;

        }else{

            return $this->permissions->contains('name', $permissionName);

        }
    }

    /**
     * Assign a permission to the role.
     */
    public function givePermissionTo($permission)
    {
        if (!$this->hasPermissionTo($permission)) {
            $permissionId = is_string($permission)
                ? Permission::where('name', $permission)->value('id')
                : $permission->id;

            $this->permissions()->attach($permissionId);
        }
    }
}
