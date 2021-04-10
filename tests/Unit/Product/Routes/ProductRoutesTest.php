<?php

namespace Tests\Unit\Product\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ProductRoutesTest extends TestCase
{
    use WithoutMiddleware, RefreshDatabase;
    
    /**
     * A basic unit test can fetch products using GET route exists.
     *
     * @return void
     */
    public function test_product_get_route_exists()
    {
        $response = $this->get('v1/products');
        $response->assertStatus(200);        
    }
    

    /**
     * A basic unit test product can store product using POST route exists.
     *
     * @return void
     */
    public function test_product_store_route_exists()
    {
        $response = $this->post('v1/products');
        $response->assertStatus(302);
    }

    /**
     * A basic unit test product can get a product using GET route exists.
     *
     * @return void
     */
    public function test_product_get_product_route_exists()
    {        
        $response = $this->get('v1/products/1');
        $response->assertStatus(404);
    }

    /**
     * A basic unit test can update product using PUT/PATCH route exists.
     *
     * @return void
     */
    public function test_product_update_route_exists()
       {
        $response = $this->put('v1/products/1');
        $response->assertStatus(302);
    }

    /**
     * A basic unit test can delete product using DELETE route exists.
     *
     * @return void
     */
    public function test_product_delete_route_exists()
       {
        $response = $this->delete('v1/products/1');
        $response->assertStatus(404);
    }
}
