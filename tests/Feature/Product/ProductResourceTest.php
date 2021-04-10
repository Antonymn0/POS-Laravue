<?php

namespace Tests\Feature\Product;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ProductResourceTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

   /**
     * A basic feature test can fetch products using GET.
     *
     * @return void
     */
    public function test_can_fetch_products()
    {
        $response = $this->get('v1/products');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can store products using POST.
     *
     * @return void
     */
    public function test_can_store_product()
    {         
        $data =$this->productDataHelper();        
        $response = $this->postJson('v1/products', $data);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
            ]);       
    }

    /**
     * A basic feature test can get a product using GET.
     *
     * @return void
     */
    public function test_can_get_a_product()
    {         
        $data =$this->productDataHelper();        
        $response = $this->postJson('v1/products', $data);
        
        $product = Product::first();
        $response = $this->get('v1/products/'.$product->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]); 
                  
    }

    /**
     * A basic feature test can update a product using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_a_product()
    {       
        //$this->withoutExceptionHandling();  
        $data = $this->productDataHelper();        
        $product = $this->postJson('v1/products', $data);
        $product = Product::first();
        
        $response = $this->json('PATCH', 'v1/products/'.$product->id, $data); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }

    /**
     * A basic feature test can delete a product using DELETE.
     *
     * @return void
     */
    public function test_can_delete_a_product()
    {       
        $data =$this->productDataHelper();        
        $response = $this->postJson('v1/products', $data);
        $product = Product::first();
        
        $response = $this->json('DELETE', 'v1/products/'.$product->id); 
        $response->assertStatus(200)
                    ->assertJson([
                        'success' => true,
                        ]);                  
    }


    /**
     * product data helper 
     *
     * @return array
    */
    private function productDataHelper(){
        return[
            'name'=> 'test name',
            'slug'=> 'test slug',
            'status'=> 'string',
            'visibility'=> 'string',
            'type'=> 'string',
            'sku'=> 'test sku',
            'regular_price'=> 2.02,
            'description'=> 'string',
            'summary'=> 'string',
            'sale_price'=> 203.1,
            'taxable'=> 2,
            'weight'=> 10.2,
            'length'=> 10.2,
            'width'=> 10.2,
            'height'=> 10.2,
            'purchase_note'=> 'string',
            'meta_title'=> 'string',
            'meta_description'=> 'string',
            'sell_button_text'=> 'string',
            'virtual'=> 1,
            'downloadable'=> 1,
            'sale_start_date'=> '2021-02-18',
            'sale_end_date'=> '2021-02-18',
            'publish_at'=> '2021-02-18',
            'deleted_at'=> '2021-02-18',
            'suspended_at'=> '2021-02-18',
            'featured_img'=> 'test/url.url'
        ];
    }
}
