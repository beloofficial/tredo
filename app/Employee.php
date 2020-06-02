<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name','surname','patronymic','sex','salary'];

    public function departments()
    {
        return $this->belongsToMany('App\Department');
    }
}
