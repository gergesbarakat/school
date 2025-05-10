<x-guest-layout>










    <!-- component -->
    <div class="bg-sky-100 flex justify-center items-center h-screen">
        <!-- Left: Image -->
        <div class="w-1/2 h-screen hidden lg:block">
            <img src="{{ asset('logos/back.jpg') }}" alt="Placeholder Image" class="object-cover w-full h-full">
        </div>
        <!-- Right: Login Form -->
        <div class= "lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
            <h1 class="text-2xl font-semibold mb-4">تسجيل الدخول</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Username Input -->
                <div class="mb-4" "bg-sky-100">
                    <x-input-label for="email" :value="__('البريد الالكتروني')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password Input -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('كلمة السر')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Remember Me Checkbox -->
                <div class="mb-4 flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="text-red-500">
                    <label for="remember" class="text-green-900 ml-2">تذكرني</label>
                </div>
                <!-- Forgot Password Link -->
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-black dark:hover:text-black rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('password.request') }}">
                            {{ __('نسيت كلمة السر?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3">
                        {{ __('تسجيل الدخول') }}
                    </x-primary-button>
                </div>
            </form>
            <!-- Sign up  Link -->
        </div>

    </div>
</x-guest-layout>
