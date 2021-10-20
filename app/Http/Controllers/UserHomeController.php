<?php

namespace App\Http\Controllers;

use App\Brand;
use Auth;
use App\Address;
use App\Product;
use DB;
use Location;
use App\User;
use Response;
use Validator;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index(){
        $brands = Brand::all();
        if(Auth::user()){
            $addresses = Address::where('user_id',Auth::user()->id)->get();
        }else{
            $addresses="";
        }
        $products = Product::select()->whereIn('code', ['GRBY005','GRBY009','KAAY003','CGCY015','SWEY009','DFRY007','KAAS013','NUTSS001','FFS007'
        ,'FRUS005','TZAT001','BABA001','SWLB003','MLP001','GARL073','PLSW001','BIW011','MLW003','ZAL013','THC003','CPC003','JAMC007','NUTM003'
        ,'CANDK001','COLN003','OLLC005','FST003','HALM003','NUTCS007','SWLK001','SWLK005','NUTWY001','DFRY013','GRLY001','RCY007','JAMS003','CHKE001'
        ,'OIGM007','FRVA007','HUMA001','COGB003','CHFM001'])
        ->inRandomOrder()->get();
        return view('index',compact('brands','addresses','products'));

        return view('index',compact('brands','addresses'));
    }

    public function search($query){
        if ($query!=""){
            $search = DB::table('products')
                        ->join('brands', 'products.brand_id', '=', 'brands.id')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->join('big_categories', 'categories.big_category_id', '=', 'big_categories.id')
                        ->select('products.*', 'brands.name','big_category_id')
                        ->where('products.code', 'like', '%' . $query . '%')
                        ->orWhere('description', 'like', '%' . $query . '%')
                        ->orWhere('brands.name', 'like', '%' . $query . '%')
                        ->get();
        }else
        $search="";
        return $search;
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function check_user(Request $request){
        
        $credentials = $request->only('email', 'password');
        $authSuccess = Auth::attempt($credentials);
        $user = User::where('email', '=', $request->email)->first();
        if($authSuccess) {
            $request->session()->regenerate();
            if ( $user->role==1 || $user->role==3) {// do your margic here
                return response([
                    'data_type' => 'admin'
                ]);
                // return redirect()->route('administrator');
            }else{
                return response([
                    'data_type' => 'user'
                ]);
            }
        }

        return response([
                'data_type' => 'error',
                'message' => 'incorrect email or password'
            ]);
    }

    public function check_password(Request $request)
    {
        $credentials = $request->only('email','password');
        $authSuccess = Auth::attempt($credentials);
        if($authSuccess) {
            return response([
                'data_type' => 'success'
            ]);
        }

        return response([
                'data_type' => 'error',
                'message' => 'incorrect password'
            ]);
    }

    public function change_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return response([
                'data_type' => 'error',
                'message' => $validator->errors()
            ]);
        }

        $user = User::where('email',$request->input('email1'))->first();
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return response([
            'data_type' => 'success'
        ]);
    }
}
