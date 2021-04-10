<?php

namespace Tests\Unit\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class OrderRoutesTest extends TestCase
{
    use WithoutMiddleware, RefreshDatabase;

    /**
     * A basic unit test can fetch order using GET route exists.
     *
     * @return void
     */
    public function test_get_order_route_exists()
    {
        $response = $this->get('v1/order');
        $response->assertStatus(200);
    }

    /**
     * A basic unit test product can store order using POST route exists.
     *
     * @return void
     */
    public function test_order_store_route_exists()
    {
        $response = $this->post('v1/order');
        $response->assertStatus(302);
    }

     /**
     * A basic unit test can get a order using GET route exists.
     *
     * @return void
     */
    public function test_get_a_order_route_exists()
    {        
        $response = $this->get('v1/order/1');
        $response->assertStatus(404);
    }
    
    /**
     * A basic unit test can update order using PUT/PATCH route exists.
     *
     * @return void
     */
    public function test_update_order_route_exists()
       {
        $response = $this->put('v1/order/1');
        $response->assertStatus(302);
    }
    
    /**
     * A basic unit test can delete order using DELETE route exists.
     *
     * @return void
     */
    public function test_order_delete_route_exists()
       {
        $response = $this->delete('v1/order/1');
        $response->assertStatus(404);
    }

}
