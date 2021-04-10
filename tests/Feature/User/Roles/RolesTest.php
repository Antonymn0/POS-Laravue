<?php

namespace Tests\Feature\User\Roles;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class RolesTest extends TestCase
{
    use RefreshDatabase,WithoutMiddleware;

    /**
     * A basic feature test can create cashier role.
     *
     * @return void
     */
    public function test_can_create_cashier()
    {
        $data =$this->userDataHelper('cashier'); 
        $response = $this->postJson('v1/users', $data);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
            ]);
    }

    
    /**
     * A basic feature test can create store_keeper role.
     *
     * @return void
     */
    public function test_can_create_storekeeper()
    {
        $data =$this->userDataHelper('store_keeper'); 
        $response = $this->postJson('v1/users', $data);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
            ]);
    }

    
    /**
     * A basic feature test can create customer role.
     *
     * @return void
     */
    public function test_can_create_customer()
    {
        $data =$this->userDataHelper('customer'); 
        $response = $this->postJson('v1/users', $data);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
            ]);
    }

    
    /**
     * A basic feature test can create HR role.
     *
     * @return void
     */
    public function test_can_create_hr()
    {
        $data =$this->userDataHelper('hr'); 
        $response = $this->postJson('v1/users', $data);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
            ]);
    }

    
    /**
     * A basic feature test can create admin role.
     *
     * @return void
     */
    public function test_can_create_admin()
    {
        $data =$this->userDataHelper('admin'); 
        $response = $this->postJson('v1/users', $data);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
            ]);
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
