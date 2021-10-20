<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactMessage;
use Auth;
use App\Address;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = ContactMessage::all();
        return view('admin.contact.index' ,compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()){
            $addresses = Address::where('user_id',Auth::user()->id)->get();
        }else{
            $addresses="";
        }
        return view('contact',compact('addresses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()){
            $contact = ContactMessage::create($request->all());
            return redirect()->back();
        }else{
            $address = Address::create($request->all());
            // $request->request->add(['address_id' =>$address->id]);
            $contact = ContactMessage::create(['name' => $request->input('uname') , 'email' => $request->input('email')
            , 'message' => $request->input('message') , 'address_id' => $address->id]);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = ContactMessage::find($id);
        $message->status=1;
        $message->save();
        $address = Address::find($message->address_id);
        return view('admin.contact.show',compact('message','address'));
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
