<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Task Manager') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { background: linear-gradient(180deg,#f8fafc 0%,#ffffff 100%); }
            .auth-card { max-width: 420px; margin: 0 auto; }
        </style>
    </head>
    <body>
        <div class="d-flex align-items-center justify-content-center min-vh-100">
            <div class="card auth-card shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <span class="avatar bg-primary text-white me-3">T</span>
                        <div>
                            <h3 class="mb-0">Task Manager</h3>
                            <div class="small text-muted">Masuk ke akun Anda</div>
                        </div>
                    </div>

                    {{ $slot }}
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
    </body>
</html>
