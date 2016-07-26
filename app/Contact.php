<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable =[
        'firstname',
        'lastname',
        'emailadd',
        'phone',
        'address'
    ];
}
