<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class LoginTest extends TestCase
{
    use RefreshDatabase,WithoutMiddleware;
    /**
     * A basic feature test can login using Email with a Post request.
     *
     * @return void
    */
    public function test_UserCanLoginUsingEmail()
    {  
        $data = $this->userDataHelper('user');        
        $response = $this->postJson('v1/users', $data);

        $data =$this->loginWithEmailDataHelper();        
        $response = $this->postJson('v1/login', $data);
        $accessToken = $response->json('access_token');
        //$this->assertNotNull($accessToken, 'Access token not generated.');   // check that the access token is not empty   
        $response
            ->assertStatus(200)            
            ->assertJson([
                'success' => true,
                'message'=>'Login successful',
            ]);
        }

    /**
     * A basic feature test can login using Username with a Post request.
     *
     * @return void
    */
    public function test_UserCanLoginUsingUsername()
    {  
        $data = $this->userDataHelper('user');        
        $response = $this->postJson('v1/users', $data);

        $data =$this->loginWithUsernameDataHelper();        
        $response = $this->postJson('v1/login', $data);
        //$accessToken = $response->json('access_token');
        //$this->assertNotNull($accessToken, 'Access token not generated.');   // check that the access token is not empty   
        $response
            ->assertStatus(200)            
            ->assertJson([
                'success' => true,
                'message'=>'Login successful',
            ]);
        }

    /**
     * A basic feature test can login using Phone with a Post request.
     *
     * @return void
    */
    public function test_UserCanLoginUsingPhone()
    {  
        $data = $this->userDataHelper('user');        
        $response = $this->postJson('v1/users', $data);

        $data =$this->loginWithPhoneDataHelper();        
        $response = $this->postJson('v1/login', $data);
        //$accessToken = $response->json('access_token');
       // $this->assertNotNull($accessToken, 'Access token not generated.');   // check that the access token is not empty   
        $response
            ->assertStatus(200)            
            ->assertJson([
                'success' => true,
                'message'=>'Login successful',
            ]);
        }

    /**
     * login with email data helper
     * 
     * @return array
    */
    private function loginWithEmailDataHelper(){
        return[
            'email'=> "jonDoe@gmail.com",     
            'password'=> 'nkkKK566.,lkjhu' 
            ];
    }

    /**
     * login with username data helper
     * 
     * @return array
    */
    private function loginWithUsernameDataHelper(){
        return[
            'user_name'=> "jonDoe01",     
            'password'=> 'nkkKK566.,lkjhu' 
            ];
    }

    /**
     * login with phone data helper
     * 
     * @return array
    */
    private function loginWithPhoneDataHelper(){
        return[
            'phone'=> "012365478",     
            'password'=> 'nkkKK566.,lkjhu' 
            ];
    }


  /**
     * user data helper
     * 
     * @param string $role
     * @return array
    */
    private function userDataHelper($role){
        return[
            'full_name'=> "Jon Doe JD",
            'role'=> $role,
            'user_name'=> "jonDoe01",
            'email'=> "jonDoe@gmail.com",
            'phone'=> "012365478",
            'address'=> "7th strt califonia",
            'password'=> 'nkkKK566.,lkjhu',  
            'password_again'=> 'nkkKK566.,lkjhu',
            'biography'=> 'biography biogrpgy',
            'id_number'=> 21366598,
            'passport_no'=> 'asdf366',
            'dob'=> '2021-02-15T21:20:22',
            'city'=> 'nairobi',
            'postal_code'=> 'f1255ffk',
            'physical_address'=> '67 k strt',
            'suspended_at'=> '2021-02-15T21:20:22',
            'email_verified_at'=> '2021-02-15T21:20:22',
            'id_verified_at'=> '2021-02-15T21:20:22',
            'gender'=> 2,
            'marital_status'=> 2,
            'kra_pin'=> 'rr66r12r',
            'nhif_no'=> '32265',
            'nssf_no'=> '22665',
            'job_id'=> '3336',
            'nationality'=> 'kenyan',
            'employment_date'=> '2021-02-15T21:20:22',
            'termination_date'=> '2021-02-15T21:20:22',
            'approved_by'=> 2,
            'supervisor_id'=> '33326',
            'registered_by'=> 2,
            'suspended_by'=> 2,
            'avatar'=> 'kokonn'
        ];
    }

}
