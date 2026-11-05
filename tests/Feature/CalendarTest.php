<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\CalendarEvent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalendarTest extends TestCase
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

    private function validEventData(array $overrides = []): array
    {
        return array_merge([
            'title' => 'Networking Examination',
            'event_type' => 'Exam',
            'event_date' => '2026-12-10',
            'event_time' => '09:00',
            'description' => 'Final examination schedule',
        ], $overrides);
    }

    public function test_authenticated_instructor_can_open_calendar(): void
    {
        $user = $this->createInstructor();

        $response = $this->actingAs($user)->get('/calendar');

        $response->assertOk();
    }

    public function test_instructor_can_create_calendar_event(): void
    {
        $user = $this->createInstructor();

        $response = $this->actingAs($user)
            ->post('/calendar', $this->validEventData());

        $response->assertRedirect('/calendar');

        $this->assertDatabaseHas('calendar_events', [
            'user_id' => $user->id,
            'title' => 'Networking Examination',
            'event_type' => 'Exam',
        ]);
    }

    public function test_instructor_can_update_own_event(): void
    {
        $user = $this->createInstructor();

        $event = CalendarEvent::create(array_merge(
            ['user_id' => $user->id],
            $this->validEventData()
        ));

        $response = $this->actingAs($user)
            ->put('/calendar/' . $event->id, $this->validEventData([
                'title' => 'Updated Examination',
            ]));

        $response->assertRedirect('/calendar');

        $this->assertDatabaseHas('calendar_events', [
            'id' => $event->id,
            'title' => 'Updated Examination',
        ]);
    }

    public function test_instructor_can_delete_own_event(): void
    {
        $user = $this->createInstructor();

        $event = CalendarEvent::create(array_merge(
            ['user_id' => $user->id],
            $this->validEventData()
        ));

        $response = $this->actingAs($user)
            ->delete('/calendar/' . $event->id);

        $response->assertRedirect('/calendar');

        $this->assertDatabaseMissing('calendar_events', [
            'id' => $event->id,
        ]);
    }

    public function test_instructor_cannot_update_another_instructors_event(): void
    {
        $owner = $this->createInstructor();

        $otherInstructor = User::create([
            'name' => 'Other Instructor',
            'username' => 'otherinstructor',
            'address' => 'Another Address',
            'age' => 30,
            'password' => 'password123',
        ]);

        $event = CalendarEvent::create(array_merge(
            ['user_id' => $owner->id],
            $this->validEventData()
        ));

        $response = $this->actingAs($otherInstructor)
            ->put('/calendar/' . $event->id, $this->validEventData([
                'title' => 'Unauthorized Update',
            ]));

        $response->assertNotFound();

        $this->assertDatabaseHas('calendar_events', [
            'id' => $event->id,
            'title' => 'Networking Examination',
        ]);
    }

    public function test_guest_cannot_access_calendar(): void
    {
        $response = $this->get('/calendar');

        $response->assertRedirect('/login');
    }
}
