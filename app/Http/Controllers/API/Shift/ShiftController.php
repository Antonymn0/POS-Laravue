<?php

namespace App\Http\Controllers\Api\Shift;

use App\Models\Shift;
use Illuminate\Http\Request;
use App\Events\ShiftCreated;
use App\Events\ShiftUpdated;
use App\Events\ShiftDestroyed;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shift\ValidateShift;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shift = Shift::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=>'A list of shifts', 
            'data'=>$shift], 200);
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
     * @param  App\Http\Requests\Shift\ValidateShift;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateShift $request)
    {
        $data = $request->validated();
        $shift= Shift::create($data);
        event(new ShiftCreated($shift));
        return response()->json([
            'success'=> true, 
            'message'=> 'Shift created successfuly', 
            'data'=>$shift],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shift = Shift::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=>'A single shift retrieved succesfuly', 
            'data'=>$shift], 200);
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
     * @param  App\Http\Requests\Shift\ValidateShift;  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateShift $request, $id)
    {
        $data = $request->validated();
        $shift = Shift::findOrFail($id);
        $shift->update($data);
        event(new ShiftUpdated($shift));
        return response()->json([
            'success'=> true,
            'message'=> 'Shift updated successfuly',
            'data'=>$shift], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shift = Shift::findOrFail($id);
        $shift->delete();
        event(new ShiftDestroyed($shift));
        return response()->json([
            'success'=> true,
             'message'=> 'Shift deleted successfuly',
             'data'=>$shift], 200);
    }
}
