<?php

namespace Tests\Feature\Order;

use Tests\TestCase;
use App\models\Order;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class OrderTest extends TestCase
{
     use RefreshDatabase,WithoutMiddleware;

     /**
     * A basic feature test can fetch order using GET.
     *
     * @return void
     */
    public function test_can_fetch_order()
    {
        $response = $this->get('v1/order');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can store order using POST.
     *
     * @return void
    */
    public function test_can_store_order()
    {  
        $data =$this->userDataHelper('cashier'); 
        $response = $this->postJson('v1/users', $data); // create user object first. needed to check $user->hasRole() 

        $data =$this->orderDataHelper();   // create order  
        $response = $this->postJson('v1/order', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);       
    }

    /**
     * A basic feature test can fetch an order using GET.
     *
     * @return void
     */
    public function test_can_fetch_a_order()
    {         
        $data =$this->userDataHelper('cashier'); 
        $response = $this->postJson('v1/users', $data); // create user object first. needed to check $user->hasRole() 

        $data =$this->orderDataHelper();        
        $response = $this->postJson('v1/order', $data);
        
        $order = Order::first();
        $response = $this->get('v1/order/'.$order->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                ]);                   
    }
    
    /**
     * A basic feature test can update an order using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_order()
    {    
        $data =$this->userDataHelper('cashier'); 
        $response = $this->postJson('v1/users', $data); // create user object first. needed to check $user->hasRole() 

        $data = $this->orderDataHelper();        
        $order = $this->postJson('v1/order', $data);
        $order = Order::first();
        
        $response = $this->json('PATCH', 'v1/order/'.$order->id, $data); 
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                ]);                  
    }

    
    /**
     * A basic feature test can delete a  order using DELETE.
     *
     * @return void
     */
    public function test_can_delete_order()
    {       
        $data =$this->userDataHelper('cashier'); 
        $response = $this->postJson('v1/users', $data); // create user object first. needed to check $user->hasRole() 

        $data =$this->orderDataHelper();        
        $response = $this->postJson('v1/order', $data);
        $order = Order::first();
        
        $response = $this->json('DELETE', 'v1/order/'.$order->id); 
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                  
    }

    /**
     * order data helper 
     *
     * @return array
    */
    private function orderDataHelper(){
        return[
            'customer_id'=> 10,
            'cashier_id'=> 11, 
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
