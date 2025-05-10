<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php
use Illuminate\Support\Facades\Auth;

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="w-full font-sans text-gray-900 antialiased">
    <div class="w-full min-h-screen flex flex-col sm:justify-center items-center  bg-gray-100 dark:bg-gray-900">
        {{-- {{ dd(Auth::guard('school')->check()); }} --}}
        @if ($errors->any())
            <div class = "absolute top-10 w-auto  right-2  p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                <span class = "font-medium">Danger alert!</span> {{ implode(' | ', $errors->all()) }}

            </div>
        @endif
        @if (session('status'))
            <div class = "  absolute top-10 w-auto right-2 p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class = "font-medium">Success ! {{ session('status') }}</span>

            </div>
        @endif

        <div class="w-full   min-h-screen  bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

            {{ $slot }}
        </div>
    </div>
</body>
<script>
    tailwind.config = {
        darkMode: 'class',
    }
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('input[type="password"]').forEach(function(input) {
            // Create eye icon wrapper
            const wrapper = document.createElement('div');
            wrapper.classList.add('relative');

            // Clone the input and insert into wrapper
            const clonedInput = input.cloneNode(true);
            input.replaceWith(wrapper);
            wrapper.appendChild(clonedInput);

            // Create the toggle icon
            const toggleIcon = document.createElement('span');
            toggleIcon.innerHTML = '👁️'; // You can use a better SVG/icon if needed
            toggleIcon.classList.add(
                'absolute', 'right-2', 'top-1/2', '-translate-y-1/2', 'cursor-pointer'
            );
            wrapper.appendChild(toggleIcon);

            // Toggle logic
            toggleIcon.addEventListener('click', () => {
                if (clonedInput.type === 'password') {
                    clonedInput.type = 'text';
                    toggleIcon.innerHTML = '🙈'; // icon changes when visible
                } else {
                    clonedInput.type = 'password';
                    toggleIcon.innerHTML = '👁️';
                }
            });
        });
    });
</script>

</html>
