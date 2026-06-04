<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input id="email" class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required autocomplete="username" />

            <p id="email-error" class="text-sm text-red-600 mt-1"></p>

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <p id="password-error" class="text-sm text-red-600 mt-1"></p>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <p id="confirm-error" class="text-sm text-red-600 mt-1"></p>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const confirm = document.getElementById('password_confirmation');

    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');
    const confirmError = document.getElementById('confirm-error');

    // EMAIL validation (basic format)
    email.addEventListener('input', function () {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email.value.length === 0) {
            emailError.innerText = '';
        } else if (!regex.test(email.value)) {
            emailError.innerText = 'Format email tidak valid';
        } else {
            emailError.innerText = '';
        }
    });

    // PASSWORD validation
    function validatePassword() {
        if (password.value.length === 0) {
            passwordError.innerText = '';
        } else if (password.value.length < 8) {
            passwordError.innerText = 'Password minimal 8 karakter';
        } else {
            passwordError.innerText = '';
        }
    }

    password.addEventListener('input', validatePassword);

    // CONFIRM password
    function validateConfirm() {
        if (confirm.value.length === 0) {
            confirmError.innerText = '';
        } else if (confirm.value !== password.value) {
            confirmError.innerText = 'Password tidak sama';
        } else {
            confirmError.innerText = '';
        }
    }

    confirm.addEventListener('input', validateConfirm);
    password.addEventListener('input', validateConfirm);

});
</script>
