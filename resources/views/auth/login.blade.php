<x-auth-layout>
     
    <div class="px-8 mx-auto bg-transparent rounded-md lg:max-w-4xl">
        <div class="grid gap-8 bg-white border border-red-200 rounded-md shadow-lg lg:grid-cols-2">
            <div class="order-2 px-8 py-4 py-8 lg:py-32 rounded-l-md lg:order-1">

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
     
                <form method="POST" action="{{ route('login') }}">
                    @csrf
            
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
            
                        <x-text-input id="password" class="block w-full mt-1"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>
            
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
            
                        <x-primary-button class="ml-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>

                    <p class="mt-8 lg:hidden">Don't have an account? <a href="{{ route('register') }}" class="font-bold text-red-700 underline">Sign Up</a></p>
                </form>
            </div>
            <div class="flex flex-col justify-center order-1 px-8 py-8 bg-red-100 border border-left lg:py-16 rounded-r-md lg:order-2">
                
                <div class="flex gap-6 lg:block">
                    <a href="/" class="flex-shrink-0">
                        <img src="{{ asset('img/logo.png') }}" class="w-auto h-20 lg:h-24" alt="">
                    </a>
                    <div>
                        <h1 class="font-bold lg:mt-8 lg:text-3xl">Login</h1>
                        <p class="mt-3 text-sm lg:text-base">Welcome to the St. Ignatius College Preparatory Admissions Portal.</p>
                    </div>
                </div>

                <p class="hidden mt-8 lg:block">Don't have an account? <a href="{{ route('register') }}" class="font-bold text-red-700 underline">Sign Up</a></p>
            </div>
        </div>
    </div>
     


   
    
</x-auth-layout>
