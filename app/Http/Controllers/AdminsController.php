<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Registration;
use App\Log;
use App\Cash;
use Mail;
use App\Mail\SendMail;

class AdminsController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function inquiry()
    {
        $inquiries = Comment::orderBy('created_at','desc')->paginate(5);

        return view('pagesadmin.inquiry')->with('inquiries',$inquiries);
    }

    public function inquiry_show($id)
    {
        $inquiry = Comment::find($id);

        return view('pagesadmin.inquiry_show')->with('inquiry', $inquiry);
    }

    public function inquiry_destroy($id)
    {
        $inquiry = Comment::find($id);
        $inquiry->delete();

        return redirect('/admin/inquiry')->with('success', 'Removed Successfully!');
    } 
    
    // RESERVE MODEL  
    public function registered()
    {   
        $registered = Registration::orderBy('created_at', 'desc')->paginate(5);

        return view('pagesadmin.registered')->with('registered', $registered);    
    }

    public function registered_show($id)
    {
        $registered = Registration::find($id);

        return view('pagesadmin.registered_show')->with('registered', $registered);
    }

    public function registered_destroy($id)
    {   
        $registered = Registration::find($id);
        $registered->delete();

        return redirect()->route('admin.registered')->with('success', 'Removed Successfully!');
    }

    public function send()
    {
        Mail::send(new sendMail());

        return redirect()->route('admin.inquiry')->with('success','Message has been sent successfully');
    }

    public function sendemail($id)
    {   
        $inquiry = Comment::find($id);

        return view('pagesadmin.inquiry_create')->with('inquiry',$inquiry);
    }

    public function logs()
    {
        $logs = Log::orderBy('created_at','DESC')->paginate(6);

        return view('pagesadmin.logs')->with('logs', $logs);
    }

    public function log_destroy($id)
    {
        $log = Log::find($id);
        $log->delete();

        return redirect()->route('admin.logs')->with('success', 'Removed Successfully!');
    }

    public function cash()
    {
        $cashes = Cash::orderBy('created_at', 'DESC')->paginate(6);

        return view('pagesadmin.cash')->with('cashes', $cashes);
    }

    public function cash_approved(Request $request)
    {
        $cash = Cash::find($request->id);
        $cash->status = 'paid';
        $cash->save();

        $register = Registration::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'amount' => $request->amount,
            'date' => $request->date,
            'token'=> $request->token
        ]);

        return redirect()->route('admin.cash')->with('success', 'Approved User Paid!');
    }

    public function cash_destory($id)
    {
        $cash = Cash::find($id);
        $cash->delete();

        return redirect()->route('admin.cash')->with('success', 'Removed Successfully!');
    }
}














