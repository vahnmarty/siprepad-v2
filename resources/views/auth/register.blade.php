<x-auth-layout>

    <div class="mx-auto bg-white rounded-md lg:max-w-4xl">
        <div class="grid gap-8 shadow-lg lg:grid-cols-2">

            <div class="flex flex-col justify-center px-8 py-8 bg-red-100 border-left rounded-r-md lg:px-8 lg:py-16">
                <div class="flex gap-6 lg:block">
                    <a href="/" class="flex-shrink-0">
                        <img src="{{ asset('img/logo.png') }}" class="w-auto h-24" alt="">
                    </a>
                    <div>
                        <h1 class="mt-8 text-3xl font-bold">Sign Up</h1>
                        <p class="mt-3">Welcome to the St. Ignatius College Preparatory Admissions Portal.</p>
                    </div>
                </div>

                <p class="mt-8">Already a User? <a href="{{ route('login') }}"
                        class="font-bold text-red-700 underline">Log In</a></p>
            </div>

            <div class="rounded-l-md lg:px-8 lg:py-16">

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block w-full mt-1" type="email" name="email"
                            :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                            autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                            name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-8">

                        <x-primary-button class="justify-center w-full">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>





</x-auth-layout>
