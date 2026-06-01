<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalTasks = Task::where('user_id', $userId)->count();

        $completedTasks = Task::where('user_id', $userId)
            ->where('status', 'completed')
            ->count();

        $inProgressTasks = Task::where('user_id', $userId)
            ->where('status', 'in_progress')
            ->count();

        $pendingTasks = Task::where('user_id', $userId)
            ->where('status', 'pending')
            ->count();

        $recentTasks = Task::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalTasks',
            'completedTasks',
            'inProgressTasks',
            'pendingTasks',
            'recentTasks'
        ));
    }
}
