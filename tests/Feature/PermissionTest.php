<?php

namespace Tests\Feature;

use Exception;
use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionTest extends TestCase
{

    protected $user;

    protected function authenticateAsOverlord()
    {
        $user = User::create([
            'name' => 'Test Overlord',
            'email' => 'test_overlord@gmail.com',
            'password' => bcrypt('Test Overlord')
        ]);

        $overlord_role = Role::where('slug', config('app.superuser_role'))->first();
        $user->roles()->attach($overlord_role);

        if (!Auth::attempt(['email' => $user->email, 'password' => $user->password]))
        {
            throw new Exception('Newly created user can not log in');
            return false;
        }

        Auth::login($user);

        $this->user = auth()->user();

        return $this->user;
        
    }

    protected function authenticateAsManager()
    {

    }

    protected function authenticateAsDeejay()
    {

    }

    protected function deleteUser($user_id)
    {
        User::find($user_id)->delete();
    }

    public function test_all_tables_are_set(){
        $this->assertTrue(
            Schema::hasColumns('users', ['id', 'name']),
            "Table * does not have the required columns"
        );

        $this->assertTrue(
            Schema::hasColumns('roles', ['id', 'name', 'slug']),
            "Table * does not have the required columns"
        );

        $this->assertTrue(
            Schema::hasColumns('permissions', ['id', 'name', 'slug']),
            "Table * does not have the required columns"
        );

        $this->assertTrue(
            Schema::hasColumns('roles_permissions', ['role_id', 'permission_id']),
            "Table * does not have the required columns"
        );

        $this->assertTrue(
            Schema::hasColumns('users_roles', ['user_id', 'role_id']),
            "Table * does not have the required columns"
        );

        $this->assertTrue(
            Schema::hasColumns('users_permissions', ['user_id', 'permission_id']),
            "Table * does not have the required columns"
        );
    }

    public function test_permissions_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('users', [
                'id', 'name', 'email', 'email_verified_at', 'password'
            ]),
            "The permissions table does not have the required columns"
        );
    }

    public function test_overlord_has_permission_to_create_song()
    {
        $overlord = $this->authenticateAsOverlord();
        
        $this->assertTrue(
            $overlord->hasPermissionTo('create-song'),
            "The user cannot create songs"
        );
    }

    public function test_manager_has_permission_to_create_song()
    {
        $manager = User::where('email', 'manager@gmail.com')->first();

        $response = $this->actingAs($manager)->get('/song/create');
        $response->assertStatus(200);
    }

    public function test_deejay_has_no_permission_to_create_song()
    {
        $deejay = User::where('email', 'deejay@gmail.com')->first();

        $response = $this->actingAs($deejay)->get('/song/create');
        $response->assertStatus(403);
    }
}
