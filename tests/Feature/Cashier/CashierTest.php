<?php

namespace Tests\Feature\Cashier;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class CashierTest extends TestCase
{
    use RefreshDatabase,WithoutMiddleware;
    
    /**
     * A basic feature cashier can create order using POST request.
     *
     * @return void
     */
    public function test_cashier_can_create_order()
    {
        
        $data =$this->userDataHelper('cashier'); 
        $response = $this->postJson('v1/users', $data);

        $cashier_id = User::first()->id_number; // get the cashier id

        $data =$this->orderDataHelper($cashier_id);        
        $response = $this->postJson('v1/order', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);      
    }

    /**
     * order data helper 
     *
     * @return array
    */
    private function orderDataHelper($cashier_id){
        return[
            'customer_id'=> 10,
            'cashier_id'=> $cashier_id, 
            'reference'=> 'test reference string',
            'status'=> 'test status',
            'type'=> 'test type',
            'deleted_at'=> '2021-02-18',
            'suspended_at'=> '2021-02-18'            
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
            'id_number'=> 11,
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
            'supervisor_id'=> 33326,
            'registered_by'=> 2,
            'suspended_by'=> 2,
            'avatar'=> 'kokonn'
        ];
    }

}
