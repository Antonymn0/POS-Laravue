<?php

namespace Tests\Unit\Media;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class MediaRoutesTest extends TestCase
{
    use WithoutMiddleware;
    
    /**
     * A basic unit test can fetch medias using GET route exists.
     *
     * @return void
     */
    public function test_get_medias_route_exists()
    {
        $response = $this->get('v1/media');
        $response->assertStatus(200);
    }

    /**
     * A basic unit test can store media using POST route exists.
     *
     * @return void
     */
    public function test_media_store_route_exists()
    {
        $response = $this->post('v1/media');
        $response->assertStatus(302);
    }

     /**
     * A basic unit test can get a media using GET route exists.
     *
     * @return void
     */
    public function test_get_a_media_route_exists()
    {        
        $response = $this->get('v1/media/1');
        $response->assertStatus(404);
    }
    
    /**
     * A basic unit test can update media using PUT/PATCH route exists.
     *
     * @return void
     */
    public function test_update_media_route_exists()
       {
        $response = $this->put('v1/media/1');
        $response->assertStatus(302);
    }
    
    /**
     * A basic unit test can delete media using DELETE route exists.
     *
     * @return void
     */
    public function test_media_delete_route_exists()
       {
        $response = $this->delete('v1/media/1');
        $response->assertStatus(404);
    }

}