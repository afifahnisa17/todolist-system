@extends('layouts.app')

@section('content')

<div class="page-header mb-4">
    <div class="row align-items-center w-100 g-3">
        <div class="col">
            <h2 class="page-title mb-1">Tasks</h2>
            <div class="text-secondary">Manage and monitor your task list</div>
        </div>

        <div class="col-auto ms-auto">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                New Task
            </a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="d-flex">
            <div>
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('tasks.index') }}">
            <div class="row g-3 align-items-end">
                <div class="col-md-6">
                    <label class="form-label">Search</label>
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Search task title..."
                    >
                </div>

                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <div class="col-md-3 d-grid">
                    <button type="submit" class="btn btn-primary">
                        Apply Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Task Date</th>
                    <th>Status</th>
                    <th class="w-1">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($tasks as $task)
                    <tr>
                        <td>
                            <div class="fw-medium">{{ $task->title }}</div>
                        </td>

                        <td>
                            <span class="text-secondary">{{ $task->task_date->format('d M Y') }}</span>
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

                        <td>
                            <div class="btn-list flex-nowrap">
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-outline-primary">
                                    View
                                </a>

                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-warning">
                                    Edit
                                </a>

                                <form action="{{ route('tasks.destroy', $task->id) }}"
                                    method="POST"
                                    class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-outline-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="empty py-5">
                                <p class="empty-title">No tasks found</p>
                                <p class="empty-subtitle text-secondary">
                                    Try changing your filter or create a new task to get started.
                                </p>
                                <div class="empty-action">
                                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                                        New Task
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

<div class="mt-3">
    {{ $tasks->links() }}
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.delete-form').forEach(form => {

        form.addEventListener('submit', function (e) {

            e.preventDefault();

            Swal.fire({
                title: 'Delete Task?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {

                if (result.isConfirmed) {
                    form.submit();
                }

            });

        });

    });

});
</script>
@endpush
