<?php

namespace App\Http\Controllers\API\User;

use App\Models\User;
use App\Helpers\Utilities;
use App\Events\UserCreated;
use App\Events\UserUpdated;
use App\Events\UserDestroyed;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUser;
use App\Http\Requests\User\ValidateUser;

class UserController extends Controller
{

    public function __construct(){
       // $this->middleware('auth:api')->except(['store']);

    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(env('API_PAGINATION', 10));
        return response()->json([
            'success'=> true,
            'message' => 'A list of users',
            'data'=>$users], 200);
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
     * @param  App\Http\Requests\User\ValidateUser  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateUser $request)
    {
        $data = $request->validated();
        $data = Utilities::createNamesFromFullName($data);
        $data['phone'] = isset($data['phone']) ? Utilities::cleanPhoneNumber($data['phone']) : null;
        $data['password'] = Hash::make($data['password']);
        if(isset($data['password_again'])) unset($data['password_again']);         
        $role = Role::firstOrCreate(['name' =>$data['role'] ]);
        $user = User::create($data);
        $user->assignRole($role);
        event(new UserCreated($user)); 

        return response()->json([
            'success'=> true,
            'message' => 'User created successfully',
            'data'=>$user], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user= User::findOrFail($id);
        return response()->json([
            'success'=> true,
            'message'=> 'Á single user retrieved successfully', 
            'data'=>$user], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\User\UpdateUser  $request
     * @param  \App\Models\User  $id
     * @return \Illuminate\Http\Response
     */
    public function update( UpdateUser $request, $id )
    {   
        $data = $request->validated();
        $user= User::findOrFail($id);
        $data['phone'] = isset($data['phone']) ? Utilities::cleanPhoneNumber($data['phone']) : null;
        $user->update($data);
        event(new UserUpdated($user));
        return response()->json([
            'success'=> true, 
            'message'=>'User updated successfuly', 
            'data'=>$user],  200);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {      
        $user= User::findOrFail($id);
        $user->delete();
        event(new UserDestroyed($user));
        return response()->json([
            'success'=> true, 
            'message'=> 'User deleted successfuly', 
            'data'=>$user], 200);
    }
   
  
     
    
    
}
