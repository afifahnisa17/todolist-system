@extends('layouts.app')

@section('content')

<div class="page-header mb-4">

    <h2 class="page-title">
        Dashboard
    </h2>

    <div>
        Welcome, {{ auth()->user()->name }}
    </div>

</div>

<div class="row row-deck row-cards">

    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="subheader">
                    Total Tasks
                </div>

                <div class="h1">
                    {{ $totalTasks }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="subheader">
                    Completed
                </div>

                <div class="h1 text-success">
                    {{ $completedTasks }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="subheader">
                    In Progress
                </div>

                <div class="h1 text-warning">
                    {{ $inProgressTasks }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="subheader">
                    Pending
                </div>

                <div class="h1 text-secondary">
                    {{ $pendingTasks }}
                </div>
            </div>
        </div>
    </div>

</div>

<div class="card mt-4">

    <div class="card-header">
        <h3 class="card-title">
            Recent Tasks
        </h3>
    </div>

    <div class="table-responsive">

        <table class="table table-vcenter">

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
                            {{ $task->title }}
                        </td>

                        <td>
                            {{ $task->task_date }}
                        </td>

                        <td>

                            @if($task->status == 'completed')

                                <span class="badge bg-success">
                                    Completed
                                </span>

                            @elseif($task->status == 'in_progress')

                                <span class="badge bg-warning">
                                    In Progress
                                </span>

                            @else

                                <span class="badge bg-secondary">
                                    Pending
                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="3">
                            No Tasks Found
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
