<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable=[
        'name','address','state','city','zip_code','telephone','fax'
    ];
}
