<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use DB;

class SliderController extends Controller
{
    public function index(){
        $products = Product::select('products.id','description','code','name','image','brand_id','category_id')
        ->leftJoin('brands','products.brand_id','=','brands.id')->where('products.code', 'not like', "%SPC%")->where('products.code', 'not like', "%DFR0%")->whereNotIn('brand_id', [0,48])->inRandomOrder()->get();
        return view('slider.index',compact('products'));
    }

    public function cpanel(){
        return view('slider.cpanel');
    }

    public function search($type,$query){
        if ($query!=""){
            if($type=='categories' || $type=='brands'){
                $search = DB::table($type)->where('name', 'like', '%' . $query . '%')->get();
            }else{
                $search = DB::table('products')->select($type)->where($type, 'like', '%' . $query . '%')->get();
            }
        }else
        $search="";
        return $search;
    }

    public function get_products($type,$item){
        if($type=='categories'){
            $category= Category::where('name',$item)->first();
            $products = Product::select('id')->where('category_id',$category->id)->get();
        }
        if($type=='brands'){
            $brand= Brand::where('name',$item)->first();
            $products = Product::select('id')->where('brand_id',$brand->id)->get();
        }
        if($type=='code'){
            $products = Product::select('id')->where('code',$item)->get();
        }
        if($type=='description'){
            $products = Product::select('id')->where('description', 'like', '%' . $item . '%')->get();
        } 
        return $products;
    }

    public function on_screen($type,$item){
        if($type=='categories'){
            $products = Product::select('id')->where('category_id',$item)->get();
        }
        if($type=='brands'){
            $products = Product::select('id')->where('brand_id',$item)->get();
        }
        return $products;
    }

    public function get_data(){
        $prods = request()->prods; 
        $in_prods = array();
        foreach($prods as $i=>$prod){
            array_push($in_prods,$prod['id']);
        }
        $products = DB::table('products')->select('products.id','description','code','name','image','brand_id','category_id')
                    ->leftJoin('brands','products.brand_id','=','brands.id')
                    ->whereIn('products.id',$in_prods)
                    ->get();
        return $products;
        

    }
}
