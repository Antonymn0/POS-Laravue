<?php

namespace Tests\Feature\User\Shift;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\models\Shift;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ShiftTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

     /**
     * A basic feature test can fetch shifts using GET.
     *
     * @return void
     */
    public function test_can_fetch_shifts()
    {
        $response = $this->get('v1/shift');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can store shift using POST.
     *
     * @return void
    */
    public function test_can_store_shift()
    {         
        $data =$this->shiftDataHelper();        
        $response = $this->postJson('v1/shift', $data);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
            ]);       
    }

    /**
     * A basic feature test can fetch a shift using GET.
     *
     * @return void
     */
    public function test_can_fetch_a_shift()
    {         
        $data =$this->shiftDataHelper();        
        $response = $this->postJson('v1/shift', $data);
        
        $shift = Shift::first();
        $response = $this->get('v1/shift/'.$shift->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                ]);                   
    }
    
    /**
     * A basic feature test can update a shift using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_shift()
    {        
        $data = $this->shiftDataHelper();        
        $shift = $this->postJson('v1/shift', $data);
        $shift = Shift::first();
        
        $response = $this->json('PATCH', 'v1/shift/'.$shift->id, $data); 
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                ]);                  
    }

    
    /**
     * A basic feature test can delete a  shift using DELETE.
     *
     * @return void
     */
    public function test_can_delete_shift()
    {       
        $data =$this->shiftDataHelper();        
        $response = $this->postJson('v1/shift', $data);
        $shift = Shift::first();
        
        $response = $this->json('DELETE', 'v1/shift/'.$shift->id); 
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                  
    }


    /**
     * shift data helper 
     *
     * @return array
    */
    private function shiftDataHelper(){
        return[
            'user_id'=> 10,
            'start_date'=> '2021-02-18',
            'end_date'=> '2021-02-18',
            'description'=> 'test string',
            'deleted_at'=> '2021-02-18',
            'suspended_at'=> '2021-02-18'            
        ];
    }

}
