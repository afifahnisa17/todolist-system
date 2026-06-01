<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management App</title>

    <link href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css" rel="stylesheet">
</head>
<body>
    <div class="page">
        <header class="navbar navbar-expand-md d-print-none">
            <div class="container-xl">
                <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                    <span class="avatar avatar-sm bg-primary text-white fw-bold me-2">T</span>
                    TodoList System
                </a>

                <div class="navbar-nav flex-row order-md-last">
                    @auth
                        <div class="nav-item">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                                Dashboard
                            </a>
                        </div>
                    @else
                        <div class="nav-item me-2">
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">
                                Login
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-primary">
                                Register
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </header>

        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl py-4 py-md-5">
                    <div class="row g-4 align-items-center mb-4">
                        <div class="col-lg-7">
                            <div class="text-uppercase text-secondary fw-semibold mb-2">Task management</div>
                            <h1 class="display-4 fw-bold mb-3">
                                Manage tasks with a clean Tabler interface.
                            </h1>
                            <p class="text-secondary fs-3 mb-4">
                                Keep your to-do list organized, track progress faster, and focus on what matters most.
                            </p>

                            <div class="d-flex flex-wrap gap-2">
                                @auth
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                                        Open Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                                        Login
                                    </a>
                                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">
                                        Register
                                    </a>
                                @endauth
                            </div>

                            <div class="d-flex flex-wrap gap-2 mt-4">
                                <span class="badge bg-primary-subtle text-primary">Dashboard overview</span>
                                <span class="badge bg-azure-lt text-azure">Task CRUD</span>
                                <span class="badge bg-green-lt text-green">Search & filter</span>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="card card-lg shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div>
                                            <div class="text-secondary text-uppercase small fw-semibold">Today</div>
                                            <div class="h2 mb-0">Workflow snapshot</div>
                                        </div>
                                        <div class="avatar avatar-md bg-primary text-white">TL</div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="card card-sm border">
                                                <div class="card-body p-3">
                                                    <div class="text-secondary small mb-1">Planned</div>
                                                    <div class="h3 mb-0">08</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card card-sm border">
                                                <div class="card-body p-3">
                                                    <div class="text-secondary small mb-1">In progress</div>
                                                    <div class="h3 mb-0">04</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card card-sm border">
                                                <div class="card-body p-3">
                                                    <div class="text-secondary small mb-1">Done</div>
                                                    <div class="h3 mb-0">12</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card card-sm border">
                                                <div class="card-body p-3">
                                                    <div class="text-secondary small mb-1">Urgent</div>
                                                    <div class="h3 mb-0">03</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-deck g-4">
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="avatar avatar-sm bg-primary text-white me-2">1</span>
                                        <strong>Dashboard</strong>
                                    </div>
                                    <p class="text-secondary mb-0">
                                        View task statistics and recent activity from one simple dashboard.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="avatar avatar-sm bg-green text-white me-2">2</span>
                                        <strong>Task Management</strong>
                                    </div>
                                    <p class="text-secondary mb-0">
                                        Create, update, view, and delete your tasks with ease.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="avatar avatar-sm bg-azure text-white me-2">3</span>
                                        <strong>Search & Filter</strong>
                                    </div>
                                    <p class="text-secondary mb-0">
                                        Quickly find tasks using status filters and search.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
