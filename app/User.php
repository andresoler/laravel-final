<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Posts () {
        
        return $this->hasMany(Post::class);

    }

    public function getGetNameAttribute()
    {
        //Convierte el nombre en mayuscula de forma visual sin alterar DB
        return strtoupper($this->name);
    }

    public function setNameAttribute($value)
    {
        //Convierte el nombre en minuscula cada que se guarde un valor nuevo en la entidad
        $this->attributes['name'] = strtolower($value);
    }
}
