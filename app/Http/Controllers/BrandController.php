<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
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
            'name.unique' => 'existed brand!',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:brands|max:125|min:2'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->with('error',$validator->messages()->first());
        }
        $brand = Brand::create(['name'=>$request->input('name')]);
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brands.edit',compact('brand'));
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
            'name.unique' => 'existed brand!',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:brands|max:125|min:2'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->with('error',$validator->messages()->first());
        }
        $brand = Brand::find($id);
        $brand->update(['name'=>$request->input('name')]);
            return redirect('administrator/brands')->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
    }
}
