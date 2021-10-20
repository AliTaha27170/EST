<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'name is required!',
            'name.min' => 'name must be more than one character!',
            'name.max' => 'name must be less than 125 character!',
            'name.unique' => 'existed category!',
            'code.required' => 'code is required!',
            'code.min' => 'code must be more than one character!',
            'code.max' => 'code must be less than 125 character!',
            'code.unique' => 'existed category!',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories|max:125|min:2',
            'code' => 'required|unique:categories|max:125|min:2'

        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->with('error',$validator->messages()->first());
        }
        $category = Category::create($request->all());
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
        $category = Category::find($id);
        return view('admin.categories.edit',compact('category'));
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
        $messages = [
            'name.required' => 'name is required!',
            'name.min' => 'name must be more than one character!',
            'name.max' => 'name must be less than 125 character!',
            'code.required' => 'code is required!',
            'code.min' => 'code must be more than one character!',
            'code.max' => 'code must be less than 125 character!',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:125|min:2',
            'code' => 'required|max:125|min:2'

        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->with('error',$validator->messages()->first());
        }
        
        $category = Category::find($id);
        if($request->input('is_hidden')==null)
        $hidden=0;
        else
        $hidden=1;
        $category->update(['name'=>$request->input('name'), 'code'=>$request->input('code'), 'is_hidden'=>$hidden]);
            return redirect('administrator/categories')->with('success', 'Added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Category::find($id);
        $brand->delete();
    }
}
