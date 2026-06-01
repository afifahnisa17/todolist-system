<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::where('user_id', Auth::id());

        // Search
        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $tasks = $query
            ->latest()
            ->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5',
            'description' => 'required',
            'task_date' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'task_date' => $validated['task_date'],
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        if ($task->user_id != Auth::id()) {
        abort(403);
    }

        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        if ($task->user_id != Auth::id()) {
            abort(403);
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        if ($task->user_id != Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|min:5',
            'description' => 'required',
            'task_date' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task->update($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        if ($task->user_id != Auth::id()) {
            abort(403);
        }

        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}
