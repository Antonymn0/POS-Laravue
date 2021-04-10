<?php

namespace App\Http\Controllers\Api\Payment;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Events\PaymentCreated;
use App\Events\PaymentUpdated;
use App\Events\PaymentDestroyed;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\ValidatePayment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = Payment::paginate(env('API_PAGINATION', 10));
        return response()->json([
                        'success'=> true,
                        'message'=>'A list of payments', 
                        'data'=>$payment], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Payment\ValidatePayment  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatePayment $request)
    {
        $data = $request->validated();
        $payment= Payment::create($data);
        event(new PaymentCreated($payment));
        return response()->json([
            'success'=> true,
            'message'=>'Payment created successfuly',
            'data'=>$payment],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single payment retrieved successfully',
            'data'=>$payment], 200);
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
     * @param  App\Http\Requests\Payment\ValidatePayment  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePayment $request, $id)
    {
        $data = $request->validated();
        $payment = Payment::findOrFail($id);
        $payment->update($data);
        event(new PaymentUpdated($payment));
        return response()->json([
            'success'=> true,
            'message'=> 'Payment updated successfuly', 
            'data'=>$payment], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        event(new PaymentDestroyed($payment));
        return response()->json([
            'success'=> true,
            'message'=>'Payment deleted successfully',
            'data'=>$payment], 200);
    }
}
