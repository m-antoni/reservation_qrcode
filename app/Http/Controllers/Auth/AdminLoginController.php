<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use Validator;

class AdminLoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest:admin', ['except' => ['adminLogout']]);
    // }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // Attempt to log in using qrcode
        if(Auth::guard('admin')->attempt(['name' => 'admin', 'password' => $request->password])){
            //return redirect()->route('admin.dashboard');
            //return ['redirect' => route('admin.dashboard')];
            $redirect = response(['redirect' => route('admin.dashboard')], 200)                        
                                ->header('Content-Type', 'text/plan');

            return $redirect;
        }
        
        // default response error
        $response = response(['message' => 'Unauthorized Attempt To Log In!',], 422)
                            ->header('Content-Type', 'text/plan');
        return $response;
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin');
    }
}
 