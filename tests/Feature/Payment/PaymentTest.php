<?php

namespace Tests\Feature\Payment;

use Tests\TestCase;
use App\models\Payment;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class PaymentTest extends TestCase
{
   use RefreshDatabase, WithoutMiddleware;

     /**
     * A basic feature test can fetch payment using GET.
     *
     * @return void
     */
    public function test_can_fetch_payment()
    {
        $response = $this->get('v1/payment');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can store payment using POST.
     *
     * @return void
    */
    public function test_can_store_payment()
    {    
             
        $data =$this->paymentDataHelper();        
        $response = $this->postJson('v1/payment', $data);
        $response ->assertStatus(201)
                ->assertJson([
                    'success' => true,
                ]);       
    }

    /**
     * A basic feature test can fetch an payment using GET.
     *
     * @return void
     */
    public function test_can_fetch_a_payment()
    {         
        $data =$this->paymentDataHelper();        
        $response = $this->postJson('v1/payment', $data);
        
        $payment = Payment::first();
        $response = $this->get('v1/payment/'.$payment->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                ]);                   
    }

    /**
     * A basic feature test can update a payment using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_payment()
    {        
        $data = $this->paymentDataHelper();        
        $payment = $this->postJson('v1/payment', $data);
        $payment = Payment::first();
        
        $response = $this->json('PATCH', 'v1/payment/'.$payment->id, $data); 
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                ]);                  
    }
   
    /**
     * A basic feature test can delete a payment using DELETE.
     *
     * @return void
     */
    public function test_can_delete_payment()
    {       
        $data =$this->paymentDataHelper();        
        $response = $this->postJson('v1/payment', $data);
        $payment = Payment::first();
        
        $response = $this->json('DELETE', 'v1/payment/'.$payment->id); 
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                  
    }
    
    /**
     * payment data helper 
     *
     * @return array
    */
    private function paymentDataHelper(){
        return[
            'order_id'=>10,
            'method'=> 'test method',
            'status'=>'test status',
            'currency'=>'test currency',
            'shipping_cost'=>10.0,
            'total_due'=>11.1,
            'total_payable'=>13.3,
            'discount_rate'=>14.4,
            'discount_amount'=>12.2,
            'payment_due_date'=>'2021-02-18',
            'interest_rate'=>15.5,
            'account_ref'=> 'test refference',
            'transaction_desc'=>'test description',
            'phone_number'=>'07123626746',
            'merchant_request_id'=>'test id',
            'checkout_request_id'=>'test id',
            'response_code'=>'test code',
            'response_msg'=>'test msg',
            'coupon_code'=>'test code',
            'deleted_at'=>'2021-02-18',
            'suspended_at'=>'2021-02-18'        
        ];
    }

}
