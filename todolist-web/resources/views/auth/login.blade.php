<x-guest-layout>
    @if (session('status'))
        <div class="alert alert-success mb-3">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="row g-3" novalidate>
        @csrf

        <div class="col-12">
            <label class="form-label">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label class="form-label">Password</label>
            <input id="password" name="password" type="password" required autocomplete="current-password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 d-flex align-items-center justify-content-between">
            <div class="form-check">
                <input id="remember_me" name="remember" class="form-check-input" type="checkbox">
                <label class="form-check-label" for="remember_me">Remember me</label>
            </div>

            {{-- <div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="link">Forgot your password?</a>
                @endif
            </div> --}}
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Log in</button>
        </div>

        <div class="col-12 text-center mt-2 small text-muted">
            Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
        </div>
    </form>
</x-guest-layout>
