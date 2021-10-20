<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Business;
use App\Address;

use Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role',2)->get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Business::find($id);
        $partnership = json_decode($user->partnership);
        $trade_refs = json_decode($user->trade_ref);
        $billing = Address::find($user->billing_id);
        $shipping = Address::find($user->shipping_id);
        $bank = Address::find($user->bank_id);
        $type_arr = array('Supermarket','Restaurant','Gourmet Shop','Gift Basket','Deli/ Grocery'
        ,'e-Business','Grocery Distributor','Deli Distributor','Full Line Distributor','Institution',$user->other_type);
        $type=array();
        for($i=0;$i<11;$i++){
            if($user->type_of_business[$i]==1)
               array_push($type,$type_arr[$i]);
        }
        
        return view('admin.users.show',compact('user','partnership','trade_refs','type','billing','shipping','bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
