@extends('layouts.app')

@section('content')

<div class="container-xl">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Tasks</h2>

        <a href="{{ route('tasks.create') }}"
            class="btn btn-primary">
            + New Task
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Search & Filter --}}
    <form method="GET"
            action="{{ route('tasks.index') }}"
            class="row g-3 mb-4">

        <div class="col-md-6">
            <input type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control"
                    placeholder="Search task...">
        </div>

        <div class="col-md-3">
            <select name="status" class="form-select">

                <option value="">
                    All Status
                </option>

                <option value="pending"
                    {{ request('status') == 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="in_progress"
                    {{ request('status') == 'in_progress' ? 'selected' : '' }}>
                    In Progress
                </option>

                <option value="completed"
                    {{ request('status') == 'completed' ? 'selected' : '' }}>
                    Completed
                </option>

            </select>
        </div>

        <div class="col-md-3">
            <button type="submit"
                    class="btn btn-primary w-100">
                Search
            </button>
        </div>

    </form>

    <div class="card">

        <div class="table-responsive">

            <table class="table table-vcenter card-table">

                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Task Date</th>
                        <th>Status</th>
                        <th width="250">Action</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($tasks as $task)

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

                        <td>

                            <a href="{{ route('tasks.show', $task->id) }}"
                                class="btn btn-info btn-sm">
                                View
                            </a>

                            <a href="{{ route('tasks.edit', $task->id) }}"
                                class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('tasks.destroy', $task->id) }}"
                                    method="POST"
                                    style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this task?')">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center">
                            No tasks found
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-3">
        {{ $tasks->links() }}
    </div>

</div>

@endsection
