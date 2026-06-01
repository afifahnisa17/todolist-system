@extends('layouts.app')

@section('content')

<div class="page-header mb-4">
    <div class="row align-items-center w-100 g-3">
        <div class="col">
            <h2 class="page-title mb-1">Dashboard</h2>
            <div class="text-secondary">Welcome back, {{ auth()->user()->name }}</div>
        </div>
        <div class="col-auto ms-auto d-flex flex-wrap gap-2">
            <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary">
                View Tasks
            </a>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                New Task
            </a>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="badge bg-primary-lt text-primary">Workspace overview</span>
                    <span class="badge bg-green-lt text-green">Tabler</span>
                </div>

                <h1 class="display-6 mb-3">Your tasks, organized in a clean Tabler dashboard.</h1>

                <p class="text-secondary fs-3 mb-4">
                    Keep an eye on progress, check recent activity, and jump into new work quickly.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row row-deck row-cards g-4 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="subheader">Total Tasks</div>
                    <span class="avatar avatar-sm bg-primary text-white">T</span>
                </div>
                <div class="h1 mb-0">{{ $totalTasks }}</div>
                <div class="text-secondary small">All tasks in your workspace</div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="subheader">Completed</div>
                    <span class="avatar avatar-sm bg-success text-white">✓</span>
                </div>
                <div class="h1 mb-0 text-success">{{ $completedTasks }}</div>
                <div class="text-secondary small">Finished tasks</div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="subheader">In Progress</div>
                    <span class="avatar avatar-sm bg-warning text-white">!</span>
                </div>
                <div class="h1 mb-0 text-warning">{{ $inProgressTasks }}</div>
                <div class="text-secondary small">Currently active</div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="subheader">Pending</div>
                    <span class="avatar avatar-sm bg-secondary text-white">•</span>
                </div>
                <div class="h1 mb-0 text-secondary">{{ $pendingTasks }}</div>
                <div class="text-secondary small">Waiting to be started</div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title mb-1">Recent Tasks</h3>
            <div class="text-secondary small">Latest activity from your task list</div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($recentTasks as $task)
                    <tr>
                        <td>
                            <div class="fw-medium">{{ $task->title }}</div>
                        </td>

                        <td>
                            <span class="text-secondary">{{ $task->task_date }}</span>
                        </td>

                        <td>
                            @if($task->status == 'completed')
                                <span class="badge bg-success-lt text-success">Completed</span>
                            @elseif($task->status == 'in_progress')
                                <span class="badge bg-warning-lt text-warning">In Progress</span>
                            @else
                                <span class="badge bg-secondary-lt text-secondary">Pending</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            <div class="empty py-5">
                                <div class="empty-img">
                                    <img src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/static/illustrations/undraw_schedule.svg" height="128" alt="No tasks">
                                </div>
                                <p class="empty-title">No tasks found</p>
                                <p class="empty-subtitle text-secondary">
                                    Create your first task to start filling this dashboard.
                                </p>
                                <div class="empty-action">
                                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                                        Add Task
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
