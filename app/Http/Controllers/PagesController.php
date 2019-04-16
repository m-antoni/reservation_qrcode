<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class PagesController extends Controller
{
    public function index(){
      	
   		return view('index');
    }

    public function commentstore(Request $request)
    {
    	// data validation
        $this->validate(request(),[
            'name' =>'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // store in database
        $comment = Comment::create([
            'name' => request('name'),
            'email' => request('email'),
            'message' => request('message')
        ]); 
        
        // return json response
        return response()->json($comment);
    }

    public function reserve()
    {
        return view('reserve');
    }
}
