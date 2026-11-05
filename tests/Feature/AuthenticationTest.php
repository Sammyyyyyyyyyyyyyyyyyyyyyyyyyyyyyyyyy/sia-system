<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'services.instructor_signup_code' => 'test-invite-code',
        ]);
    }

    private function validSignupData(array $overrides = []): array
    {
        return array_merge([
            'fullname' => 'Test Instructor',
            'address' => 'Test Address, Philippines',
            'age' => 25,
            'username' => 'testinstructor',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'invite_code' => 'test-invite-code',
        ], $overrides);
    }

    public function test_instructor_can_register_successfully(): void
    {
        $response = $this->post('/signup', $this->validSignupData());

        $response->assertRedirect('/login');

        $this->assertDatabaseHas('users', [
            'username' => 'testinstructor',
            'name' => 'Test Instructor',
        ]);
    }

    public function test_registration_rejects_invalid_invitation_code(): void
    {
        $response = $this->post('/signup', $this->validSignupData([
            'invite_code' => 'wrong-code',
        ]));

        $response->assertSessionHasErrors('invite_code');

        $this->assertDatabaseMissing('users', [
            'username' => 'testinstructor',
        ]);
    }

    public function test_registration_rejects_duplicate_username(): void
    {
        User::create([
            'name' => 'Existing Instructor',
            'username' => 'testinstructor',
            'address' => 'Existing Address',
            'age' => 30,
            'password' => 'password123',
        ]);

        $response = $this->post('/signup', $this->validSignupData());

        $response->assertSessionHasErrors('username');
    }

    public function test_instructor_can_login_successfully(): void
    {
        $user = User::create([
            'name' => 'Test Instructor',
            'username' => 'testinstructor',
            'address' => 'Test Address',
            'age' => 25,
            'password' => 'password123',
        ]);

        $response = $this->post('/login', [
            'username' => 'testinstructor',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_login_rejects_incorrect_credentials(): void
    {
        $response = $this->post('/login', [
            'username' => 'testinstructor',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('username');
        $this->assertGuest();
    }
}
