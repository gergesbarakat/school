<x-app-layout>

    <body class="body bg-white dark:bg-[#0F172A]">

        <x-side-bar></x-side-bar>

        <div class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white dark:bg-slate-800 p-10 rounded-lg shadow-lg text-center max-w-md w-full">
                    <h1 class="text-3xl font-bold text-green-600 mb-4">شكراً لك!</h1>
                    <p class="text-gray-700 dark:text-gray-300 mb-6">تمت تعبئة الجدول بنجاح. يمكنك العودة أو الذهاب إلى
                        لوحة
                        التحكم.</p>

                    <div class="flex justify-center space-x-4 rtl:space-x-reverse">
                        {{-- <button onclick="history.back()"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded">
                            الرجوع
                        </button> --}}
                        <form method="POST" action="{{ route('school.logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('school.logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('تسجيل الخروج') }}
                            </x-responsive-nav-link>
                        </form>
                        {{-- <a href="{{ route('dashboard') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                            لوحة التحكم
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>

    </body>
</x-app-layout>
