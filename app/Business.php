<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable=[
        'name','trade_name','contact_name','est_year','email','type_of_business','other_type','email_token',
        'bank_acc_no','tax_id_no','sales_tax_no','partnership','trade_ref','billing_id','shipping_id','bank_id'
    ]; 
}
