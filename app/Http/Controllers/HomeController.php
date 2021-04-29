<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Email;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function emails()
    {
        $list = Email::where('user_id',Auth::user()->id)->get();
        return view('emails',compact('list'));
    }
    public function emails_store(Request $request){
        $this->validate($request, [
            'email'     => 'required|email',
            'subject'   => 'required',
            'message'   => 'required',
        ]);
        Email::create([
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'user_id'=>Auth::user()->id,
        ]);
        return back();
    }
}
