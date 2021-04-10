<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class LoginRouteTest extends TestCase
{
     
    /**
     * A basic unit test login route exists.
     *
     * @return void
     */
    public function test_login_route_exists()
    {        
        $response = $this->post('v1/login');
        $response->assertStatus(302);
    }


}
