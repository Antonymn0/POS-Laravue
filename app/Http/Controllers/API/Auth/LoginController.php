<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use App\Helpers\Utilities;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Events\LoginSuccessful;
use Laravel\Passport\HasApiTokens;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\Auth\ValidateLogin;

class LoginController extends Controller
{

    /**
     * Login user using email.
     *
     * @param App\Http\Requests\User\ValidateLogin; $request
     * @return \Illuminate\Http\Response
     * @return $access_token
     */
    public function Login(ValidateLogin $request){      

        $login_data =  $request->validated();
        //$request = $this->DetermineIfEmailOrPhoneOrUsername($request); 
        //$login_data = $request->except('emailOrPhoneOrUsername'); // remove emailOrPhoneOrUsername field from the request object
        $authenticated = false;
        $phone = Utilities::cleanPhoneNumber($request->phone); 

        if (  Auth::attempt( ['email' => $request->email, 'password' => $request->password] ) ){ 
            $authenticated = true;
            $user = User::where('email',$request->email)->first();
        }
        else if( Auth::attempt( ['phone' => $phone, 'password' => $request->password] ) ){
            $authenticated = true;
            $user = User::where('phone',$phone )->first();
        } 
        else if( Auth::attempt( ['user_name' => $request->user_name, 'password' => $request->password]) ){ 
            $authenticated = true; 
            $user = User::where('user_name',$request->user_name)->first();
        }
        if( ! $authenticated || ! $user )
            return response(['success'=> 'false', 'message'=> 'Unsuccessful, Invalid credentials'],401);


        //$user = Auth::user();
       // $access_token = $user->createToken('accessToken');  
        event(new LoginSuccessful($user));
        return response([
             'success'=>'true',
             'message'=>'Login successful',
             'data'=>$user,
             //'access_token'=>$access_token
            ],200);
    }

    /**
     * determine if the value passed is phone, email, or username.
     *
     * @return array
     */
    protected function DetermineIfEmailOrPhoneOrUsername($request)
    {
        $login = request()->input('emailOrPhoneOrUsername');
        if(is_numeric($login)){
            $field = 'phone';
            $login =  Utilities::cleanPhoneNumber($login);  // sanitize phone number
            
        } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } else {
            $field = 'user_name';
        }        
     return  request()->merge([$field => $login]); 
    }


    /**
     * Get the login username/field to be used by the controller.
     *
     * @return string
     */
    protected function username()
    {
        $login = request()->input('emailOrPhoneOrUsername');
        if(is_numeric($login)){
            $field = 'phone';
        } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } else {
            $field = 'user_name';
        }
        dd($field);
         return $field;  
    }

}
