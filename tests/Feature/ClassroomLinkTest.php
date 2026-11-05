<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\ClassroomLink;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClassroomLinkTest extends TestCase
{
    use RefreshDatabase;

    private function createInstructor(): User
    {
        return User::create([
            'name' => 'Test Instructor',
            'username' => 'testinstructor',
            'address' => 'Test Address',
            'age' => 25,
            'password' => 'password123',
        ]);
    }

    public function test_instructor_can_open_allowed_classroom_page(): void
    {
        $user = $this->createInstructor();

        $response = $this->actingAs($user)
            ->get('/online-classes/classroom/3-A');

        $response->assertOk();
    }

    public function test_instructor_can_save_classroom_link(): void
    {
        $user = $this->createInstructor();

        $response = $this->actingAs($user)
            ->post('/online-classes/classroom/3-A/link', [
                'google_classroom_url' => 'https://classroom.google.com/c/test123',
            ]);

        $response->assertRedirect('/online-classes/classroom/3-A');

        $this->assertDatabaseHas('classroom_links', [
            'block' => '3-A',
            'google_classroom_url' => 'https://classroom.google.com/c/test123',
        ]);
    }

    public function test_saving_existing_block_updates_its_link(): void
    {
        $user = $this->createInstructor();

        ClassroomLink::create([
            'block' => '3-A',
            'google_classroom_url' => 'https://classroom.google.com/c/old123',
        ]);

        $response = $this->actingAs($user)
            ->post('/online-classes/classroom/3-A/link', [
                'google_classroom_url' => 'https://classroom.google.com/c/new123',
            ]);

        $response->assertRedirect('/online-classes/classroom/3-A');

        $this->assertDatabaseHas('classroom_links', [
            'block' => '3-A',
            'google_classroom_url' => 'https://classroom.google.com/c/new123',
        ]);

        $this->assertDatabaseMissing('classroom_links', [
            'block' => '3-A',
            'google_classroom_url' => 'https://classroom.google.com/c/old123',
        ]);
    }

    public function test_instructor_can_delete_classroom_link(): void
    {
        $user = $this->createInstructor();

        ClassroomLink::create([
            'block' => '3-A',
            'google_classroom_url' => 'https://classroom.google.com/c/test123',
        ]);

        $response = $this->actingAs($user)
            ->delete('/online-classes/classroom/3-A/link');

        $response->assertRedirect('/online-classes/classroom/3-A');

        $this->assertDatabaseMissing('classroom_links', [
            'block' => '3-A',
        ]);
    }

    public function test_invalid_classroom_url_is_rejected(): void
    {
        $user = $this->createInstructor();

        $response = $this->actingAs($user)
            ->post('/online-classes/classroom/3-A/link', [
                'google_classroom_url' => 'https://example.com/classroom',
            ]);

        $response->assertSessionHasErrors('google_classroom_url');

        $this->assertDatabaseMissing('classroom_links', [
            'block' => '3-A',
        ]);
    }

    public function test_unsupported_block_is_rejected(): void
    {
        $user = $this->createInstructor();

        $response = $this->actingAs($user)
            ->get('/online-classes/classroom/3-Z');

        $response->assertNotFound();
    }

    public function test_guest_cannot_access_classroom_page(): void
    {
        $response = $this->get('/online-classes/classroom/3-A');

        $response->assertRedirect('/login');
    }
}
