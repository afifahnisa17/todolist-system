<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskIndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_view_task_index_page()
    {
        $response = $this->get(route('tasks.index'));

        $response->assertStatus(200);
        $response->assertSee('Tasks');
    }

    /** @test */
    public function it_displays_tasks()
    {
        Task::factory()->create([
            'title' => 'Belajar Laravel',
            'status' => 'pending',
        ]);

        $response = $this->get(route('tasks.index'));

        $response->assertStatus(200);
        $response->assertSee('Belajar Laravel');
    }

    /** @test */
    public function it_can_search_tasks_by_title()
    {
        Task::factory()->create([
            'title' => 'Laravel Project',
        ]);

        Task::factory()->create([
            'title' => 'React Project',
        ]);

        $response = $this->get(route('tasks.index', [
            'search' => 'Laravel'
        ]));

        $response->assertSee('Laravel Project');
        $response->assertDontSee('React Project');
    }

    /** @test */
    public function it_can_filter_tasks_by_status()
    {
        Task::factory()->create([
            'title' => 'Task Pending',
            'status' => 'pending',
        ]);

        Task::factory()->create([
            'title' => 'Task Completed',
            'status' => 'completed',
        ]);

        $response = $this->get(route('tasks.index', [
            'status' => 'completed'
        ]));

        $response->assertSee('Task Completed');
        $response->assertDontSee('Task Pending');
    }

    /** @test */
    public function it_shows_empty_state_when_no_tasks_exist()
    {
        $response = $this->get(route('tasks.index'));

        $response->assertSee('No tasks found');
    }

    /** @test */
    public function it_shows_pagination()
    {
        Task::factory()->count(15)->create();

        $response = $this->get(route('tasks.index'));

        $response->assertStatus(200);

        // cek beberapa task tampil
        $response->assertViewHas('tasks');
    }
}
