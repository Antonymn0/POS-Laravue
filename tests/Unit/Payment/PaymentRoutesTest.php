<?php

namespace Tests\Unit\Payment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class PaymentRoutesTest extends TestCase
{
    use WithoutMiddleware, RefreshDatabase;

   /**
     * A basic unit test  fetch payment using GET route exists.
     *
     * @return void
     */
    public function test_get_payment_route_exists()
    {
        $response = $this->get('v1/payment');
        $response->assertStatus(200);
    }

    /**
     * A basic unit test  store payment using POST route exists.
     *
     * @return void
     */
    public function test_payment_store_route_exists()
    {
        $response = $this->post('v1/payment');
        $response->assertStatus(302);
    }

     /**
     * A basic unit test  get a payment using GET route exists.
     *
     * @return void
     */
    public function test_get_a_payment_route_exists()
    {        
        $response = $this->get('v1/payment/1');
        $response->assertStatus(404);
    }
    
    /**
     * A basic unit test  update payment using PUT/PATCH route exists.
     *
     * @return void
     */
    public function test_update_payment_route_exists()
       {
        $response = $this->put('v1/payment/1');
        $response->assertStatus(302);
    }
    
    /**
     * A basic unit test can delete payment using DELETE route exists.
     *
     * @return void
     */
    public function test_payment_delete_route_exists()
       {
        $response = $this->delete('v1/payment/1');
        $response->assertStatus(404);
    }

}
