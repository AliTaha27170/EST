<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable=[
        'name','email','message','status','address_id'
    ];
}
