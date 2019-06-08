<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public static function roleSelect()
    {
        $roles = Role::pluck('name', 'id')->toArray();
        return $roles;
    }
}
