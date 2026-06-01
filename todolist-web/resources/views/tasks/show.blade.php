@extends('layouts.app')

@section('content')

<div class="container-xl">

    <div class="card">

        <div class="card-header">
            <h3>{{ $task->title }}</h3>
        </div>

        <div class="card-body">

            <p>
                <strong>Description:</strong>
            </p>

            <p>
                {{ $task->description }}
            </p>

            <hr>

            <p>
                <strong>Date:</strong>
                {{ $task->task_date }}
            </p>

            <p>
                <strong>Status:</strong>

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

            </p>

        </div>

    </div>

</div>

@endsection
