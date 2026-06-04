<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // GET /api/tasks
    public function index(Request $request)
    {
        return response()->json(
            Task::where('user_id', $request->user()->id)->latest()->get()
        );
    }

    // GET /api/tasks/{task}
    public function show(Request $request, Task $task)
    {
        $this->authorizeTask($request, $task);

        return response()->json($task);
    }

    // POST /api/tasks
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:8',
            'description' => 'required',
            'task_date' => 'required|date',
            'status' => 'required',
        ]);

        $validated['user_id'] = $request->user()->id;

        $task = Task::create($validated);

        return response()->json($task, 201);
    }

    // PUT /api/tasks/{task}
    public function update(Request $request, Task $task)
    {
        $this->authorizeTask($request, $task);

        $validated = $request->validate([
            'title' => 'sometimes|required|min:8',
            'description' => 'sometimes|required',
            'task_date' => 'sometimes|date',
            'status' => 'sometimes',
        ]);

        $task->update($validated);

        return response()->json($task);
    }

    // DELETE /api/tasks/{task}
    public function destroy(Request $request, Task $task)
    {
        $this->authorizeTask($request, $task);

        $task->delete();

        return response()->json([
            'message' => 'Task deleted'
        ]);
    }

    // 🔒 simple ownership check
    private function authorizeTask(Request $request, Task $task)
    {
        if ($task->user_id !== $request->user()->id) {
            abort(403, 'Unauthorized');
        }
    }
}
