<x-guest-layout>
    <div class="pb-7 space-y-1 text-center">
        <span class="text-2xl text-gray-700 font-bold">LOGIN</span>
        <h1 class="">Please enter your credentials.</h1>
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        {{-- <x-input label="Username" class="h-11" icon="user" />
        <x-input type="password" label="Password" class="h-11" icon="lock-closed" /> --}}
        <!-- Email Address -->
        <div>
            <x-input-label for="login" :value="__('Email/Username')" />
            <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <div class="text-center pt-8">
        <span class="text-sm">Don't have an account yet? <a href="{{ route('register') }}"
                class="underline text-blue-500 hover:text-gray-700">Register
                here</a></span>
    </div>
</x-guest-layout>
