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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>



</head>

<body class="font-sans antialiased h-full min-h-screen top-0 bg-white  ">
    <div class="min-h-screen h-full min-h-screen bg-gray-100 dark:bg-gray-900 top-0 bg-white  ">
        @if ($errors->any())
            <div class = "absolute top-10 w-full    p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                <span class = "font-medium">Danger alert!</span> {{ implode(' | ', $errors->all()) }}

            </div>
        @endif
        @if (session('status'))
            <div class = "  absolute top-10 w-full  p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class = "font-medium">Success ! {{ session('status') }}</span>

            </div>
        @endif
        {{-- @include('layouts.navigation') --}}

        <!-- Page Heading -->
        {{-- @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset --}}

        <!-- Page Content -->

        <main class="top-0 h-full min-h-screen pt-20 bg-white  ">

            {{-- <nav class = "flex px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-[#1E293B] " aria-label="Breadcrumb">
                <ol class = "inline-flex items-center space-x-1 md:space-x-3">
                    <li class = "inline-flex items-center">
                        <a href="#" class = "inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            <svg class = "w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class = "flex items-center">
                            <svg class = "w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd"></path></svg>
                            <a href="#" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Templates</a>
                        </div>
                    </li>
                </ol>
            </nav> --}}
            {{ $slot }}
        </main>
    </div>
</body>


<script>
    const sidebar = document.querySelector("aside");
    const maxSidebar = document.querySelector(".max")
    const miniSidebar = document.querySelector(".mini")
    const roundout = document.querySelector(".roundout")
    const maxToolbar = document.querySelector(".max-toolbar")
    const logo = document.querySelector('.logo')
    const content = document.querySelector('.content')
    const moon = document.querySelector(".moon")
    const sun = document.querySelector(".sun")

    // function setDark(val) {
    //     if (val === "dark") {
    //         document.documentElement.classList.add('dark')
    //         moon.classList.add("hidden")
    //         sun.classList.remove("hidden")
    //     } else {
    //         document.documentElement.classList.remove('dark')
    //         sun.classList.add("hidden")
    //         moon.classList.remove("hidden")
    //     }
    // }

    function openNav() {
        if (sidebar.classList.contains('-translate-x-48')) {
            // max sidebar
            sidebar.classList.remove("-translate-x-48")
            sidebar.classList.add("translate-x-none")
            maxSidebar.classList.remove("hidden")
            maxSidebar.classList.add("flex")
            miniSidebar.classList.remove("flex")
            miniSidebar.classList.add("hidden")
            maxToolbar.classList.add("translate-x-0")
            maxToolbar.classList.remove("translate-x-24", "scale-x-0")
            logo.classList.remove("ml-12")
            content.classList.remove("ml-12")
            content.classList.add("ml-12", "md:ml-60")
        } else {
            // mini sidebar
            sidebar.classList.add("-translate-x-48")
            sidebar.classList.remove("translate-x-none")
            maxSidebar.classList.add("hidden")
            maxSidebar.classList.remove("flex")
            miniSidebar.classList.add("flex")
            miniSidebar.classList.remove("hidden")
            maxToolbar.classList.add("translate-x-24", "scale-x-0")
            maxToolbar.classList.remove("translate-x-0")
            logo.classList.add('ml-12')
            content.classList.remove("ml-12", "md:ml-60")
            content.classList.add("ml-12")

        }

    }

    tailwind.config = {
        darkMode: 'class',
    }
    document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('input[type="password"]').forEach(function (input) {
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
