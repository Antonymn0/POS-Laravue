<?php

namespace App\Http\Controllers\API\Order;

use App\models\OrderProduct;
use Illuminate\Http\Request;
use App\Events\OrderProductsCreated;
use App\Events\OrderProductsUpdated;
use App\Events\OrderProductsDestroyed;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\ValidateOrderProduct;

class OrderProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_products = OrderProduct::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true, 
            'message'=> 'A list of different orders products',
            'data'=>$order_products], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\Media\ValidateOrderProduct;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateOrderProduct $request)
    {
        $data = $request->validated();
        // $user = isset( $data['cashier_id']) ? User::find( $data['cashier_id']) : null;
        // if( !$user->hasRole('cashier') )
        //     return response()->json([
        //                 'success'=> false,
        //                 'message'=> 'Access denied',
        //                 'data'=>[] ], 403);
                        
        $order_products= OrderProduct::create($data);
        event(new OrderProductsCreated($order_products));
        return response()->json([
            'success'=> true,
            'message'=> 'Order Products created successfuly',
            'data'=>$order_products],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($order_id)
    {
        $order_product = OrderProduct::where('order_id', $order_id)->get();
        if (!count($order_product)) {
             return response()->json([
            'success'=> false,
            'message'=>'Items not found',
            ], 404);
        }        
        return response()->json([
            'success'=> true,
            'message'=>'A single order products retrieved successfuly',
            'data'=>$order_product], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateOrderProduct $request, $order_id)
    {
        $data = $request->validated();
        $order_products = OrderProduct::where('order_id', $order_id)->get();
        foreach ($order_products as $item) {
           $item->delete();
         }
        $order_products = OrderProduct::create($data);
        event(new OrderProductsUpdated($order_products));
        return response()->json([
            'success'=> true, 
            'message'=>'Order products updated successfuly',
            'data'=>$order_products], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($order_id)
    {
        $order_products = OrderProduct::where('order_id', $order_id)->get();
        if ( !count($order_products)  ) {
             return response()->json([
            'success'=> false,
            'message'=>'Items not found',
            ], 404);
        }
        foreach ($order_products as $item) {
           $item->delete(); //delete all the products
         }
        event(new OrderProductsDestroyed( $order_products));
        return response()->json([
            'success'=> true,
            'message'=> 'Order products deleted successfuly',
            'data'=>$order_products], 200);    
    }

}
