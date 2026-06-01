@extends('layouts.app')

@section('content')

<div class="container-xl">

    <div class="page-header mb-4">
        <h2>Create Task</h2>
    </div>

    <div class="card">

        <div class="card-body">

            <form method="POST"
                  action="{{ route('tasks.store') }}">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Title
                    </label>

                    <input type="text"
                           name="title"
                           value="{{ old('title') }}"
                           class="form-control">

                    @error('title')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        class="form-control">{{ old('description') }}</textarea>

                    @error('description')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Task Date
                    </label>

                    <input type="date"
                           name="task_date"
                           value="{{ old('task_date') }}"
                           class="form-control">

                    @error('task_date')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Status
                    </label>

                    <select name="status"
                            class="form-select">

                        <option value="">
                            Select Status
                        </option>

                        <option value="pending">
                            Pending
                        </option>

                        <option value="in_progress">
                            In Progress
                        </option>

                        <option value="completed">
                            Completed
                        </option>

                    </select>

                    @error('status')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <div class="d-flex justify-content-end">

                    <a href="{{ route('tasks.index') }}"
                       class="btn btn-secondary me-2">
                        Cancel
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        Save Task
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
