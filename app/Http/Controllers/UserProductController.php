<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Brand;

use App\Product;
use App\BookInfo;
use DB;

class UserProductController extends Controller
{
    public function index(Request $request,$big_cat_id){
        if ($request->isMethod('get')) {
            $categories = Category::where('is_hidden','0')->where('big_category_id',$big_cat_id)->get();
            if($big_cat_id==4){
                $products = Product::where('category_id',$categories[0]->id)->where('is_hidden','0')->orderBy('code')->get();
            }else{
                $products = Product::where('category_id',$categories[0]->id)->where('is_hidden','0')->orderBy('id')->get();
            }
            $cat_id=$categories[0]->id;
            $cat_name = Category::where('id',$cat_id)->first();
            $big_cat = $big_cat_id;
        }else{
            $categories = Category::where('is_hidden','0')->where('big_category_id',$big_cat_id)->get();
            if($big_cat_id==4){
                $products = Product::where('category_id',$request->input('cat_id'))->where('is_hidden','0')->orderBy('code')->get();
            }else{
                $products = Product::where('category_id',$request->input('cat_id'))->where('is_hidden','0')->orderBy('id')->get();
            }
            $cat_id=$request->input('cat_id');
            $cat_name = Category::where('id',$cat_id)->first();
            $big_cat = $big_cat_id;
        }
        return view('products',compact('categories','products','cat_id','cat_name','big_cat'));
    }

    public function get_products($cat_id,$id){
        if($cat_id==4){
        $products = Product::where('category_id',$id)->where('is_hidden','0')->orderBy('code')->get();
        }else{
        $products = Product::where('category_id',$id)->where('is_hidden','0')->orderBy('id')->get();
        }
        $categories = Category::where('is_hidden','0')->where('big_category_id',$cat_id)->orderBy('id')->get();
        $category = Category::find($id);
        $big_cat = $cat_id;
        $returnHTML = view('products_ajax')->with('products', $products)->with('big_cat', $big_cat)->with('category', $category)->with('categories', $categories)->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }

    public function cookbooks(){
        $books =  DB::table('products')
                    ->join('book_infos', 'products.id', '=', 'book_infos.id')
                    ->where('category_id',0)->where('is_hidden','0')->paginate(5);

        return view('cookbooks',compact('books'));
    }

    public function product_list(){
        $categories = Category::all();
        $products = Product::all();
        return view('product_list',compact('products','categories'));
    }

    public function brand_products($br){
        $products = Product::where('brand_id',$br)->get();
        $brand = Brand::find($br);
        // return response()->json($brand);
        if(!($br == 5 || $br == 12 || $br == 124 || $br == 125))
        $brand->id=0;
        return view('brand_products',compact('products','brand'));
    }
}
