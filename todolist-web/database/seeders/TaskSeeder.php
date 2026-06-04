<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {

            Task::create([
                'user_id' => $user->id,
                'title' => 'Prepare Project Proposal',
                'description' => 'Create project proposal document.',
                'task_date' => now()->addDays(1),
                'status' => 'pending',
            ]);

            Task::create([
                'user_id' => $user->id,
                'title' => 'Database Design',
                'description' => 'Create ERD and table relationships.',
                'task_date' => now()->addDays(2),
                'status' => 'in_progress',
            ]);

            Task::create([
                'user_id' => $user->id,
                'title' => 'Feature Testing',
                'description' => 'Write feature tests for task module.',
                'task_date' => now()->addDays(3),
                'status' => 'completed',
            ]);
        }
    }
}
