<?php

namespace App\Http\Controllers;

use App\Events\AcceptUser;
use App\Jobs\SendVerificationEmail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Business;
use App\Address;
use App\User;
use Auth;
use Validator;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =Business::where('status', 0)->get();
        return view('admin.business.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:businesses|max:125|min:2',
            // 'name' => 'required|max:125|min:2',
            // 'trade_name' => 'required|max:125|min:2',
            // 'contact_name' => 'required|max:125|min:2',
            // 'est_year' => 'required|max:125|min:2',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // make trade references json array
        $trade_ref_l = count($request->input('trade_ref_company'));
        $trade_ref_values = array();
        for($i=0;$i<$trade_ref_l;$i++){
            $sub_val = array();
            array_push($sub_val,$request->input('trade_ref_company')[$i],$request->input('trade_ref_contact')[$i]
            ,$request->input('trade_ref_tel')[$i],$request->input('trade_ref_fax')[$i]);
            array_push($trade_ref_values,$sub_val);
        }
        $trade_ref_keys = [
            "company_name",
            "contact_name",
            "telephone",
            "fax"
        ];
        $trade_ref = array_map(function($trade_ref_values) use ($trade_ref_keys) {
            return array_combine($trade_ref_keys, $trade_ref_values);
        }, $trade_ref_values);
        $trade_ref = json_encode($trade_ref);

        // make partnerships json array
        $partnership_l = count($request->input('partnership_name'));
        $partnership_values = array();
        for($i=0;$i<$partnership_l;$i++){
            $sub_val = array();
            array_push($sub_val,$request->input('partnership_name')[$i],$request->input('partnership_value')[$i]);
            array_push($partnership_values,$sub_val);
        }
        
        $partnership_keys = [
            "name",
            "security_no"
        ];
        $partnership = array_map(function($partnership_values) use ($partnership_keys) {
            return array_combine($partnership_keys, $partnership_values);
        }, $partnership_values);
        $partnership = json_encode($partnership);

        // store checkbox values
        $type_array="";
        for($x=0;$x<11;$x++){
            if($request->input('type_of_business'.$x)==null)
            $type_of_business=0;
            else
            $type_of_business=1;
            $type_array=$type_array.$type_of_business;
        }
        // add billing address
        $billing = Address::create(['name'=>$request->input('billing_name'),'address'=>$request->input('billing_address')
        ,'state'=>$request->input('billing_state'),'city'=>$request->input('billing_city'),'zip_code'=>$request->input('billing_zipcode')
        ,'telephone'=>$request->input('billing_tel'),'fax'=>$request->input('billing_fax')]);

        // add shipping address
        $shipping = Address::create(['name'=>$request->input('shipping_name'),'address'=>$request->input('shipping_address')
        ,'state'=>$request->input('shipping_state'),'city'=>$request->input('shipping_city'),'zip_code'=>$request->input('shipping_zipcode')
        ,'telephone'=>$request->input('shipping_tel'),'fax'=>$request->input('shipping_fax')]);

        // add bank address
        $bank = Address::create(['name'=>$request->input('bank_name'),'address'=>$request->input('bank_address')
        ,'state'=>$request->input('bank_state'),'city'=>$request->input('bank_city'),'zip_code'=>$request->input('bank_zipcode')
        ,'telephone'=>$request->input('bank_tel'),'fax'=>$request->input('bank_fax')]);
        
        $email_token = base64_encode($request->input('email'));

        $request->request->add(['partnership' => $partnership]);
        $request->request->add(['trade_ref' => $trade_ref]);
        $request->request->add(['type_of_business' =>$type_array]);
        $request->request->add(['billing_id' =>$billing->id]);
        $request->request->add(['shipping_id' =>$shipping->id]);
        $request->request->add(['bank_id' =>$bank->id]);
        $request->request->add(['email_token' => $email_token ]);
        $business = Business::create($request->all());

        $billing->user_id = $business->id;
        $billing->save();

        $shipping->user_id = $business->id;
        $shipping->save();

        // new SendVerificationEmail($business);
        $message=1;
        return redirect()->back()->with('message',$message);
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
        
        return view('admin.business.show',compact('user','partnership','trade_refs','type','billing','shipping','bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this_user = Auth::user();
        if($id == $this_user->id){
            $user = Business::find($id);
            $billing = Address::find($user->billing_id);
            $shipping = Address::find($user->shipping_id);
            $bank = Address::find($user->bank_id);
            return view('profile_edit',compact('user','partnership','trade_refs','billing','shipping','bank'));
        }else{
            return redirect()->back();
        }
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
        $user = Business::find($id);

        $user->contact_name = $request->input('contact_name');
        $user->save();
        // billing address
        $billing = Address::where('id',$user->billing_id)
                            ->update(['name'=>$request->input('billing_name'),'address'=>$request->input('billing_address')
                            ,'state'=>$request->input('billing_state'),'city'=>$request->input('billing_city'),'zip_code'=>$request->input('billing_zipcode')
                            ,'telephone'=>$request->input('billing_tel'),'fax'=>$request->input('billing_fax')]);

        // shipping address
        $shipping = Address::where('id',$user->shipping_id)
                            ->update(['name'=>$request->input('shipping_name'),'address'=>$request->input('shipping_address')
                            ,'state'=>$request->input('shipping_state'),'city'=>$request->input('shipping_city'),'zip_code'=>$request->input('shipping_zipcode')
                            ,'telephone'=>$request->input('shipping_tel'),'fax'=>$request->input('shipping_fax')]);

        // bank address
        $bank = Address::where('id',$user->bank_id)
                        ->update(['name'=>$request->input('bank_name'),'address'=>$request->input('bank_address')
                        ,'state'=>$request->input('bank_state'),'city'=>$request->input('bank_city'),'zip_code'=>$request->input('bank_zipcode')
                        ,'telephone'=>$request->input('bank_tel'),'fax'=>$request->input('bank_fax')]);

        return redirect()->back()->with('success','edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $business = Business::find($id);
        $business->delete();
    }



        /**
    * Handle a registration request for the application.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function accept( $id)
    {
        $business = Business::find($id);
        $password = str_random(8);
        $user = User::create([
            'id' => $id,
            'name' => $business->name,
            'role' => '2',
            'email' => $business->email,
            'password' => Hash::make($password),
        ]);
        $business->user_pass = $password;
        $business->save();
        event(new AcceptUser($business));
        dispatch(new SendVerificationEmail($business));
        $business->sent_email = 1;
        $business->save();
        // $users =Business::where('status', 0)->get();
        return redirect()->back()->with('success','User accepted');
        // return view('admin.business.index',compact('users'))->with('success', 'User accepted');
    }
    /**
    * Handle a registration request for the application.
    *
    * @param $token
    * @return \Illuminate\Http\Response
    */
    public function verify($token)
    {
        $business = Business::where('email_token',$token)->first();
        $business->status = 1;
        $user = User::find($business->id);
        if($business->save()){
            Auth::login($user);
            return redirect('/');
        }

    }

    public function show_to_user($id)
    {
        $this_user = Auth::user();
        if($id == $this_user->id){
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
            
            return view('profile',compact('user','partnership','trade_refs','type','billing','shipping','bank'));
        }else{
            return redirect()->back();
        }
        
    }
}
