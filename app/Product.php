<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'code','description','packing','piece_cart_weight','size_type1','size_value1','size_type2'
        ,'size_value2','price','is_hidden','in_stock','image','brand_id','category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}
