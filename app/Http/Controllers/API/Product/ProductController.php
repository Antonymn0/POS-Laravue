<?php

namespace App\Http\Controllers\Api\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Events\ProductCreated;
use App\Events\ProductUpdated;
use App\Events\ProductDestroyed;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ValidateProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true,
            'message'=>'A list of products',
            'data'=>$products], 200);
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
     * @param  use App\Http\Requests\User\ValidateProduct;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateProduct $request)
    {   
        $data = $request->validated();
        $product= Product::create($data);
        event(new ProductCreated($product));
        return response()->json([
            'success'=> true,
            'message'=>'Product created successfuly',
            'data'=>$product],  201);
    }   

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json([
            'success'=> true, 
            'message'=>'A single product retrieved successfuly',
            'data'=>$product],  200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update product resource in storage.
     *
     * @param  use App\Http\Requests\User\ValidateProduct;  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateProduct $request, $id)
    {
        $data = $request->validated();
        $product = Product::findOrFail($id);
        $product->update($data);
        event(new ProductUpdated($product));
        return response()->json([
            'success'=> true,
            'message'=> 'Product updated successfuly', 
            'data'=>$product],  200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        event(new ProductDestroyed($product));
        return response()->json([
            'success'=> true, 
            'message'=>'Product deleted successfuly',
            'data'=>$product],  200);
    }
}
