<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role; 

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Define the many-to-many relationship with roles
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}