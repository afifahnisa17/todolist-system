<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>

    <link href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <style>
        .sidebar-shell {
            min-height: 100vh;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            border-right: 1px solid rgba(148, 163, 184, 0.14);
        }

        .sidebar-brand {
            background: #ffffff;
            border: 1px solid rgba(148, 163, 184, 0.12);
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.04);
        }

        .sidebar-nav {
            padding-left: 0;
        }

        .sidebar-nav .nav-item {
            width: 100%;
        }

        .sidebar-nav .nav-link {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            text-align: left;
            width: 100%;
            padding: 0.85rem 1rem;
        }

        .sidebar-nav .nav-link-title {
            margin-left: 0;
            text-align: left;
            flex: 1;
        }

        .sidebar-nav .nav-link-icon {
            width: 24px;
            min-width: 24px;
            display: flex;
            justify-content: center;
        }

        .sidebar-nav .nav-link:hover {
            background-color: rgba(37, 99, 235, 0.08);
        }

        .sidebar-nav .nav-link.active {
            background-color: rgba(37, 99, 235, 0.12);
            color: #1d4ed8;
            font-weight: 600;
        }

        .sidebar-account {
            background: #ffffff;
            border: 1px solid rgba(148, 163, 184, 0.12);
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.04);
        }
    </style>
</head>

<body>

<div class="page">

    <!-- Sidebar -->
    <aside class="navbar navbar-vertical navbar-expand-lg navbar-light sidebar-shell">
        <div class="container-fluid d-flex flex-column h-100">

            <div class="w-100 pt-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="card sidebar-brand rounded-4 mb-0 flex-grow-1 me-2">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3">
                                <span class="avatar avatar-md bg-primary text-white fw-bold">T</span>
                                <div>
                                    <div class="fw-bold fs-3">Task Manager</div>
                                    <div class="text-secondary small">Modern task workspace</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-outline-primary d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-menu"></i>
                    </button>
                </div>

                <div class="text-uppercase text-secondary small fw-semibold px-2 mb-2">
                    MENU
                </div>

                <div class="collapse navbar-collapse" id="sidebarMenu">
                    <ul class="navbar-nav sidebar-nav">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <span class="nav-link-icon"><i class="ti ti-layout-dashboard fs-4"></i></span>
                            <span class="nav-link-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('tasks.index') }}"
                            class="nav-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}">
                            <span class="nav-link-icon"><i class="ti ti-list-check fs-4"></i></span>
                            <span class="nav-link-title">Tasks</span>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>

            @auth
                <div class="mt-auto pb-3 w-100">
                    <div class="card sidebar-account rounded-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="avatar avatar-sm bg-azure text-white fw-bold">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </span>
                                    <div class="min-width-0">
                                        <div class="fw-semibold text-truncate">{{ auth()->user()->name }}</div>
                                        <div class="text-secondary small text-truncate">{{ auth()->user()->email }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger w-100">
                                        <i class="ti ti-logout-2 me-1"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth

        </div>
    </aside>

    <!-- Content -->
    <div class="page-wrapper">

        <div class="d-lg-none bg-white border-bottom">
            <div class="container-fluid py-2">
                <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ti ti-menu"></i>
                </button>
            </div>
        </div>

        <div class="page-body">
            <div class="container-xl">

                @yield('content')

            </div>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>

</body>
</html>
