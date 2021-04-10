<?php

namespace App\Http\Controllers\Api\Media;

use App\models\Media;
use Illuminate\Http\Request;
use App\Events\MediaCreated;
use App\Events\MediaUpdated;
use App\Events\MediaDestroyed;
use App\Http\Controllers\Controller;
use App\Http\Requests\Media\ValidateMedia;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media = Media::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true,
            'message'=>'A list of Media records', 
            'data'=>$media], 200);
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
     * @param use App\Http\Requests\Media\ValidateMedia;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateMedia $request)
    {
        $data = $request->validated();
        $media= Media::create($data);
        event(new MediaCreated($media));
        return response()->json([
            'success'=> true,
            'message'=> 'Media created successfuly',
            'data'=>$media],  201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media = Media::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=> 'A single media retrieved successfuly',
            'data'=>$media], 200);
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
     * @param  use App\Http\Requests\Media\ValidateMedia;  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateMedia $request, $id)
    {
        $data = $request->validated();
        $media = Media::findOrFail($id);
        $media->update($data);
        event(new MediaUpdated($media));
        return response()->json([
            'success'=> true, 
            'message'=> 'Media updated successfuly',
            'data'=>$media], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();
        event(new MediaDestroyed($media));
        return response()->json([
            'success'=> true, 
            'message'=> 'Media deleted successfuly',
            'data'=>$media], 200);
    }
}
