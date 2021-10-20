<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('trade_name');            
            $table->string('contact_name');            
            $table->integer('est_year');            
            $table->string('email')->unique();;            
            $table->char('type_of_business', 11); 
            $table->string('other_type')->nullable();
            $table->string('tax_id_no');            
            $table->string('bank_acc_no');           
            $table->string('sales_tax_no');
            $table->longText('partnership');            
            $table->longText('trade_ref');
            $table->tinyInteger('status')->default('0');
            $table->integer('billing_id');
            $table->integer('shipping_id');
            $table->integer('bank_id');   
            $table->string('email_token')->nullable();         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesses');
    }
}
