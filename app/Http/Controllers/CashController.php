<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Response;
use App\Cash;
use Carbon\Carbon;
use QRCode;

class CashController extends Controller
{
   public function cash(){

  	return view('cash.cashregistration');
  }

	public function cash_store(Request $request)
	{
		// data validation
		$this->validate($request,[
			'name' => 'required',
			'email' => 'required|email',
			'phone' => 'required|numeric',
			'date' => 'required|date|after:tomorrow',
		]);

		// create a token 
		$token = str_random(60);
		// create a qrcode
		$qr_code = QRCode::text($token)
							->setSize(10)
							->setMargin(2)
							->setOutFile(public_path('storage/temporary.png'))
							->png();	
		
		// store in database				
 		$cash = Cash::create([
			'name' => request('name'),
			'email' => request('email'),
			'phone' => request('phone'),
			'date' => request('date'),
			'amount' => request('amount'),
			'status' => 'unpaid',
			'token' => $token
		]);
			// return  redirect to download
			return response(['redirect' => route('cash.download')], 200)
											->header('Content-Type', 'text/plan');
	}

	public function download()
	{
		return view('cash.cashdownloadfile');
	}

	public function download_file()
	{
		// path file of qrcode.png
		$file = public_path('storage/temporary.png');

		$headers = array(
			'Content-type: image/png'
		);
		// check if the file  exists
			$result = File::exists($file);

			if($result){
				// downlaod the file and delete it from orign directory
				return response()->download($file,'generated_file.png', $headers)->deleteFileAfterSend(true);
			}else{
				// redirect if there is no file
				return redirect()->route('cash');
			}
	}

	public function get_qrcode(Request $request)
	{
		//dd($request-all());	
		$result = $request->result;
		// query to DB where token is located
		$query = Cash::where('token', $result)->first();

		if($query){
			// return if registered
			return response()->json(['message' => 'QRCode is already REGISTERED!']);
		}else{
			// just return the qrcode result
       return response(['error' => $result], 200)
                   ->header('Content-Type', 'text/plan');
		}
	}
}
