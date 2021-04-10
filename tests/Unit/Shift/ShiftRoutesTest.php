<?php

namespace Tests\Unit\Shift;


use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ShiftRoutesTest extends TestCase
{
    use WithoutMiddleware, RefreshDatabase;
    
    /**
     * A basic unit test can fetch all shifts using GET route exists.
     *
     * @return void
     */
    public function test_shift_get_route_exists()
    {
        $response = $this->get('v1/shift');
        $response->assertStatus(200);        
    }
    

    /**
     * A basic unit test  can store shift using POST route exists.
     *
     * @return void
     */
    public function test_shift_store_route_exists()
    {
        $response = $this->post('v1/shift');
        $response->assertStatus(302);
    }

    /**
     * A basic unit test can get a shift using GET route exists.
     *
     * @return void
     */
    public function test_get_shift_route_exists()
    {        
        $response = $this->get('v1/shift/1');
        $response->assertStatus(404);
    }

    /**
     * A basic unit test can update product using PUT/PATCH route exists.
     *
     * @return void
     */
    public function test_shift_update_route_exists()
       {
        $response = $this->put('v1/shift/1');
        $response->assertStatus(302);
    }

    /**
     * A basic unit test can delete shift using DELETE route exists.
     *
     * @return void
     */
    public function test_shift_delete_route_exists()
       {
        $response = $this->delete('v1/shift/1');
        $response->assertStatus(404);
    }
}
