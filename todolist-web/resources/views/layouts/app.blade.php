<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>

    <link href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css"
          rel="stylesheet">
</head>

<body>

<div class="page">

    <!-- Sidebar -->
    <aside class="navbar navbar-vertical navbar-expand-lg">
        <div class="container-fluid">

            <h1 class="navbar-brand">
                Task Manager
            </h1>

            <div class="navbar-nav">

                <a href="{{ route('dashboard') }}"
                   class="nav-link">
                    Dashboard
                </a>

                <a href="#"
                   class="nav-link">
                    Tasks
                </a>

            </div>

        </div>
    </aside>

    <!-- Content -->
    <div class="page-wrapper">

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
