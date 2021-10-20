<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\BookInfo;
use Validator;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.index',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create',compact('brands','categories'));
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
            'code' => 'required|unique:products|max:125|min:2',
            'image' => 'image|required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error',$validator->messages()->first());
        }
        $ext = $request->file('image')->getClientOriginalExtension();
        // filename to store
        $image= $request->input('code').'.'.$ext;
        // upload image
        $path = public_path().'/storages/images/products';
        $uplaod = $request->file('image')->move($path,$image);
        // $path = $request->file('image')->storeAs('public/images/products',$image);

        $requestData = $request->all();
        $requestData['image'] = $image;
        $product = Product::create($requestData);
        if($requestData['category_id']==0){
            $book = BookInfo::create(['id'=>$product->id, 'author'=>$request->input('author'),'language'=>$request->input('language'),'long_description'=>$request->input('long_description')]);
        }
            return redirect()->back()->with('success', 'Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::find($id);
        if($product->category_id==0)
        $book = BookInfo::find($id);
        else
        $book="";
        return view('admin.products.edit',compact('product','categories','brands','book'));
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
        $validator = Validator::make($request->all(), [
            'code' => 'required|max:125|min:2',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error',$validator->messages()->first());
        }

        $requestData = $request->all();
        $product = Product::find($id);

        if($request->input('is_hidden')==null){
            $requestData['is_hidden'] = 0;
        }else{
            $requestData['is_hidden'] = 1;
        }

        if($request->input('in_stock')==null){
            $requestData['in_stock'] = 0;
        }else{
            $requestData['in_stock'] = 1;
        }

        if($request->file('image')==""){
            $requestData['image'] = $product->image;
        }else{
            // delete old image
            $image_path= public_path('storage/images/products/'.$product->image);
            if(File::exists($image_path)){
                File::delete($image_path);
            }
            $ext = $request->file('image')->getClientOriginalExtension();
            // filename to store
            $image= $request->input('code').'.'.$ext;
            // upload image
            $path = public_path().'/storages/images/products';
            $uplaod = $request->file('image')->move($path,$image);
            $requestData['image'] = $image;
        }
        $product->update($requestData);
        if($requestData['category_id']=='cook books'){    
            $book = BookInfo::find($id);
            $book->update(['id'=>$product->id, 'author'=>$request->input('author'),'language'=>$request->input('language'),'long_description'=>$request->input('long_description')]);
        }
        return redirect('administrator/products')->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        // delete image
        $image_path= public_path('storage/images/products/'.$product->image);

        if(File::exists($image_path)){
            File::delete($image_path);
        }
        if($product->category_id==0){
            $book = BookInfo::find($id);
            $book->delete();
        }

        $product->delete();
    }
}
