<?php

namespace Tests\Feature\Media;

use Tests\TestCase;
use App\models\Media;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class MediaResourceTest extends TestCase
{
     use RefreshDatabase, WithoutMiddleware;

   /**
     * A basic feature test can fetch media using GET.
     *
     * @return void
     */
    public function test_can_fetch_media()
    {
        $response = $this->get('v1/media');
        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * A basic feature test can store media using POST.
     *
     * @return void
    */
    public function test_can_store_media()
    {         
        $data =$this->mediaDataHelper();        
        $response = $this->postJson('v1/media', $data);
        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
            ]);       
    }

    /**
     * A basic feature test can fetch a media using GET.
     *
     * @return void
     */
    public function test_can_fetch_a_media()
    {         
        $data =$this->mediaDataHelper();        
        $response = $this->postJson('v1/media', $data);
        
        $media = Media::first();
        $response = $this->get('v1/media/'.$media->id);
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                ]);                   
    }
    
    /**
     * A basic feature test can update a media using PUT/PATCH.
     *
     * @return void
     */
    public function test_can_update_media()
    {        
        $data = $this->mediaDataHelper();        
        $media = $this->postJson('v1/media', $data);
        $media = Media::first();
        
        $response = $this->json('PATCH', 'v1/media/'.$media->id, $data); 
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                ]);                  
    }

    
    /**
     * A basic feature test can delete  media using DELETE.
     *
     * @return void
     */
    public function test_can_delete_a_media()
    {       
        $data =$this->mediaDataHelper();        
        $response = $this->postJson('v1/media', $data);
        $media = Media::first();
        
        $response = $this->json('DELETE', 'v1/media/'.$media->id); 
        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    ]);                  
    }


    /**
     * media data helper 
     *
     * @return array
    */
    private function mediaDataHelper(){
        return[
            'name'=> 'test name',
            'slug'=> 'test slug',
            'url'=> 'string',
            'path'=> 'string',
            'file_type'=> 'string',            
            'size'=> 2.02,
            'description'=> 'string',
            'deleted_at'=> '2021-02-18',
            'suspended_at'=> '2021-02-18'            
        ];
    }

}
