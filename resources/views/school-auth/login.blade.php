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
            <form method="POST" action="{{ route('school.login') }}">
                @csrf
                <!-- Username Input -->
                <div class="mb-4  bg-sky-100">
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
                <div class="flex items-center justify-center mt-4">


                    <x-primary-button class="w-full m-5 twxt-center  align-center  justify-center ms-3">
                        {{ __('تسجيلي الدخول') }}
                    </x-primary-button>
                </div>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-black dark:hover:text-black rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('school.password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </form>
            <!-- Sign up  Link -->
            <button onclick="window.location.replace('{{ route('school.register') }}')"
                class=" mt-20 w-full my-4 rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2"
                type="button">
                اضف مدرسة جديدة
            </button>
        </div>

    </div>
</x-guest-layout>
