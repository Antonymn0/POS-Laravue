<?php

namespace Tests\Feature\Order;

use Tests\TestCase;
use App\models\OrderProduct;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class OrderProductsTest extends TestCase
{
    
    use RefreshDatabase,WithoutMiddleware;

    /**
     *  A basic feature test can fetch order products using GET.
     *
     * @return void
     */
    public function test_can_fetch_order_products()
    {
        $response = $this->get('v1/order_products');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }


    /**
     * A basic feature test can store order products using POST.
     *
     * @return void
    */
    public function test_can_store_order_products()
    {    
        $data =$this->orderProductsDataHelper();        
        $response = $this->postJson('v1/order_products', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);       
    }
    
    /**
     * A basic feature test can fetch single order products using GET.
     *
     * @return void
     */
    public function test_can_fetch_single_order_products()
    {         
        $data =$this->orderProductsDataHelper();        
        $response = $this->postJson('v1/order_products', $data);       
        
        $response = $this->get('v1/order_products/'.$data['order_id']);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                ]);                   
    }

     /**
     * A basic feature test can update  order products using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_order_products()
    {        
        $data = $this->orderproductsDataHelper();        
        $order = $this->postJson('v1/order', $data);
        
        $response = $this->json('PUT', 'v1/order_products/'.$data['order_id'], $data); 
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                ]);                  
    }

    
    /**
     * A basic feature test can delete  order products using DELETE.
     *
     * @return void
     */
    public function test_can_delete_order_products()
    {       
        $data =$this->orderProductsDataHelper();        
        $response = $this->postJson('v1/order_products', $data);
        
        $response = $this->json('DELETE', 'v1/order_products/'.$data['order_id']); 
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
    private function orderProductsDataHelper(){
        return[
            'product_id'=> 10,
            'order_id'=> 11, 
            'product_name'=> 'bread',
            'description'=> 'test string',
            'quantity'=> 5,
            'product_price'=>50,
            'discount_per_unit'=>2,
            'total_discount_amount'=>10,
            'discount_percentage'=>2,
            'price_per_unit'=>48,
            'total_amount'=>240            
        ];
    }

}
