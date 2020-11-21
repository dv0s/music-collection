<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_users_database_has_expected_columnsTest()
    {
        $this->assertTrue(
            Schema::hasColumns('users', [
                'id', 'name', 'email', 'email_verified_at', 'password'
            ]),
            "The users table does not have the required columns"
        );

    }

    public function test_user_can_see_login_screen()
    {
        $response = $this->get("/login");

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    public function test_user_gets_redirected_if_logged_in(){
        $user = User::factory()->make();
        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/');
    }
}
