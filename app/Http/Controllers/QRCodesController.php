<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Registration;
use App\Log;

class QRCodesController extends Controller
{
    public function qrcodeTester()
    {   
        // qrcode testing module
    	return view('pagesadmin.qrcodetester');
    }

    public function qrcodeScanner()
    {   
        // user qrcode scanner
    	return view('pagesadmin.qrcodescanner');
    }

    public function store_qrcodeScanner(Request $request)
    {   
        $time = Carbon::now();
        
        $query = Registration::where('token', $request->qrcode)->firstOrFail();

        $user = Log::where('name', $query->name)->first();

        if(!$user){
            // do stuff if user not found
            $this->store_login($query->name, $time);

            return response()->json(['message' => $query->name . ' Time: ' . Carbon::now()->format('h:i A')]);
        }else{
            // do stuff if user found
           if($user->status == 'Inactive'){

                return response()->json(['error' => 'Unauthorize attempt to Log...']);

           }else{

                $user->time_out = $time;
                $user->status = 'Inactive';
                $user->save();
                
                return response()->json(['message' => 'Thank you, Goodbye!']);
           }
        }    
    }

    public function store_login($name, $time)
    {
        $log = Log::create([
            'name' => $name,
            'time_in'=> $time,
            'time_out' => null,
            'status' => 'Active'
        ]);
    }
}
