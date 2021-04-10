<?php

namespace Tests\Unit\User\Routes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserRoutesTest extends TestCase
{
    // use WithoutMiddleware;
    /**
     * A basic unit test can fetch users using GET.
     *
     * @return void
     */
    public function test_user_get_route_exists()
    {
        $response = $this->get('v1/users');
        $response->assertStatus(200);
    }
    

    /**
     * A basic unit test user can store user using POST.
     *
     * @return void
     */
    public function test_user_store_route_exists()
    {
        $response = $this->post('v1/users');
        $response->assertStatus(302);
    }

    /**
     * A basic unit test user can a get user using GET.
     *
     * @return void
     */
    public function test_user_get_user_route_exists()
    {
        $response = $this->get('v1/users/1');
        $response->assertStatus(404);
    }

    /**
     * A basic unit test can update user using PUT/PATCH.
     *
     * @return void
     */
    public function test_user_update_route_exists()
       {
        
        $response = $this->put('v1/users/1');
        $response->assertStatus(302);
    }

    /**
     * A basic unit test can delete user using DELETE.
     *
     * @return void
     */
    public function test_user_delete_route_exists()
       {        
        $response = $this->delete('v1/users/1');
        $response->assertStatus(404);
    }
}
