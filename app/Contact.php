<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable =[
        'name',
        'imageUrl',
        'company',
        'job_title',
        'emailadd',
        'phone1',
        'phone2',
        'street_address1',
        'street_address2',
        'city',
        'postal_code',
        'country'
    ];
    public function contacts(){
        return $this->belongsTo(User::class);
    }
}
