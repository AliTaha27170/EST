<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\ContactMessage;
use App\Calendar;
use DB;
use Carbon\Carbon;

class AdminHomeController extends Controller
{
    public function index()
    {
        //registered users
        $reg_users =Business::where('status', 0)->count();

        // mailbox
        $messages =ContactMessage::where('status', 0)->count();

        
        return view('admin.index',compact('reg_users','messages'));
    }

    public function calendar(){
        return view('admin.calendar');
    }


}
