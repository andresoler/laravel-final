<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function User () {
        
        return $this->belongsTo(User::class);

    }

    public function getGetTitleAttribute()
    {
        //Convierte el titulo en mayuscula de forma visual sin alterar DB
        return strtoupper($this->title);
    }

    public function setTitleAttribute($value)
    {
        //Convierte el nombre en minuscula cada que se guarde un valor nuevo en la entidad
        $this->attributes['title'] = strtolower($value);
    }
}
