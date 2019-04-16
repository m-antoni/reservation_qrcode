<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use Illuminate\Support\Facades\Storage;
use File;
use Response;
use App\Registration;
use QRCode;

class RegistrationsController extends Controller
{
	public function checkout()
	{
		return view('creditcard.checkout');
	}

	public function checkout_store(Request $request)
	{
		//dd($request->all());
		$this->validate($request,[
				'name' => 'required',
				'email' => 'required|email',
				'phone' => 'required|min:11',
				'amount' => 'required',
				'date' => 'required|date|after:tomorrow'
		]);

		try {
        $charge = Stripe::charges()->create([
            'amount' => $request->amount,
            'currency' => 'PHP',
            'source' => $request->stripeToken,
            'description' => 'Billing for Balagbag Traverse Online System',
            'receipt_email' => $request->email,
            'metadata' => [
                'data1' => $request->phone,
                'data2' => $request->amount,
                'data3' => $request->stripeToken
            ],
        ]);

      	// create a qrcode
				$qr_code = QRCode::text($request->stripeToken)
									->setSize(10)
									->setMargin(2)
									->setOutFile(public_path('storage/temporary.png'))
									->png();	

        // Store in Database
				$register = Registration::create([
						'name' => $request->name,
						'email' => $request->email,
						'phone' => $request->phone,
						'amount' => $request->amount,
						'date' => $request->date,
						'token'=> $request->stripeToken
				]);
        // SUCCESSFUL
        return redirect()->route('download');

    } catch (CardErrorException $e) {
        // save info to database for failed
        return back()->withErrors('Error! ' . $e->getMessage());
    }
	}

	public function download()
	{
		return view('creditcard.downloadfile');
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
			return response()
						->download($file,'generated_file.png', $headers)
						->deleteFileAfterSend(true);
		}else{
			// redirect if there is no file
			return redirect()->route('checkout');
		}
	}

	public function get_qrcode(Request $request)
	{
		//dd($request-all());	
		$result = $request->result;
		// query to DB where token is located
		$query = Registration::where('token', $result)->first();

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
