<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Message;

class ApiPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::orderBy('created_at','DESC')->get();

        return response()->json($payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // we don't need the create method which will show a frontend of forms
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(),[
            'name' => 'required',
            'card_type' => 'required',
            'card_number' => 'required',
            'card_expiry' => 'required',
            'rf_code' => 'required'
        ]);

        $payment = Payment::create([
            'name' => request('name'),
            'card_type' => request('card_type'),
            'card_number' => request('card_number'),
            'card_expiry' => request('card_expiry'),
            'rf_code' => request('rf_code')
        ]);

        return response()->json($payment);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::find($id)->get();

        return response()->json($payment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // we don't need this method which shows a form to edit
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
        $validator = Validator::make($request->all(),[
            'fullname' => 'required',
            'contact' => 'required',
            'payment' => 'required',
            'reference_number' => 'required'
        ]);

        if($validator->fails())
        {
            $response = array('response' => $validator->message(), 'success' => false);
            return $response;
        
        }else{

            // Find by id
            $payment = Payment::find($id);
            $payment->fullname = $request->input('fullname');
            $payment->contact = $request->input('contact');
            $payment->payment = $request->input('payment');
            $payment->reference_number = $request->input('reference_number');
            $payment->save();
            return response()->json($payment);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();

        $response = array('response' => 'Payments Information Deleted', 'success' => true);

        return response()->json($response); 
    }
}


