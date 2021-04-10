<?php

namespace Tests\Unit\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class OrderProductsRouteTest extends TestCase
{
   use WithoutMiddleware, RefreshDatabase;

    /**
     * A basic unit test can fetch order products using GET route exists.
     *
     * @return void
     */
    public function test_get_order_products_route_exists()
    {
        $response = $this->get('v1/order_products');
        $response->assertStatus(200);
    }

    /**
     * A basic unit test product can store order products using POST route exists.
     *
     * @return void
     */
    public function test_store_order_products_route_exists()
    {
        $response = $this->post('v1/order_products');
        $response->assertStatus(302);
    }

     /**
     * A basic unit test can get a single order products using GET route exists.
     *
     * @return void
     */
    public function test_get_single_order_products_route_exists()
    {        
        $response = $this->get('v1/order_products/1');
        $response->assertStatus(404);
    }
    
    /**
     * A basic unit test can update order products using PUT/PATCH route exists.
     *
     * @return void
     */
    public function test_update_order_products_route_exists()
       {
        $response = $this->put('v1/order_products/1');
        $response->assertStatus(302);
    }
    
    /**
     * A basic unit test can delete order products using DELETE route exists.
     *
     * @return void
     */
    public function test_order_products_delete_route_exists()
       {
        $response = $this->delete('v1/order_products/1');
        $response->assertStatus(404);
    }

}
