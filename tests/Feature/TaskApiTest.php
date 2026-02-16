<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_all_tasks()
    {
        Task::factory()->count(3)->create();

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }

    public function test_can_create_task()
    {
        $taskData = [
            'title' => 'Test Task',
            'description' => 'Test Description',
            'status' => 'pending'
        ];

        $response = $this->postJson('/api/tasks', $taskData);

        $response->assertStatus(201)
            ->assertJsonPath('data.title', 'Test Task');
        $this->assertDatabaseHas('tasks', ['title' => 'Test Task']);
    }

    public function test_can_show_task()
    {
        $task = Task::factory()->create();

        $response = $this->getJson("/api/tasks/{$task->id}");

        $response->assertStatus(200)
            ->assertJsonPath('data.id', $task->id);
    }

    public function test_can_update_task()
    {
        $task = Task::factory()->create();
        $updateData = ['title' => 'Updated Title'];

        $response = $this->patchJson("/api/tasks/{$task->id}", $updateData);

        $response->assertStatus(200)
            ->assertJsonPath('data.title', 'Updated Title');
        $this->assertDatabaseHas('tasks', ['title' => 'Updated Title']);
    }

    public function test_can_delete_task()
    {
        $task = Task::factory()->create();

        $response = $this->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    public function test_returns_404_for_nonexistent_task()
    {
        $response = $this->getJson('/api/tasks/999');
        $response->assertStatus(404);
    }

    public function test_validation_fails_on_create()
    {
        $response = $this->postJson('/api/tasks', []);
        $response->assertStatus(422)
            ->assertJson(['title' => []]);
    }
}
