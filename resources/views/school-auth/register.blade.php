<x-guest-layout>
    <form method="POST" action="{{ route('school.register') }}">
        @csrf

        <div class="flex flex-col justify-center sm:h-screen p-4">
            <div class="max-w-md w-full mx-auto border border-slate-300 rounded-2xl p-8">
                <div class="text-center mb-12">
                    <a class="text-2xl" href="{{ route('school.school-dashboard') }}">
                        جداول مدارس البنات
                    </a>
                </div>

                     <div class="space-y-6">
                        <div>
                            <label class="text-slate-800 text-sm font-medium mb-2 block">اسم المدرسة </label>
                            <input name="name" type="text"
                                class="text-slate-800 bg-white border border-slate-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500"
                                placeholder="اسم المدرسة" />
                        </div>
                        <div>
                            <label class="text-slate-800 text-sm font-medium mb-2 block">البريد الالكتروني</label>
                            <input name="email" type="text"
                                class="text-slate-800 bg-white border border-slate-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500"
                                placeholder="البريد الالكتروني" />
                        </div>
                        <div>
                            <label class="text-slate-800 text-sm font-medium mb-2 block">كلمة السر</label>
                            <input name="password" type="password"
                                class="text-slate-800 bg-white border border-slate-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500"
                                placeholder="كلمة السر" />
                        </div>
                        <div>
                            <label class="text-slate-800 text-sm font-medium mb-2 block">تاكيد كلمة المرور</label>
                            <input name="password_confirmation" type="password "
                                class="text-slate-800 bg-white border border-slate-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500"
                                placeholder="تاكيد كلمة المرور" />
                        </div>
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox"
                                class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-slate-300 rounded" />
                            <label for="remember-me" class="text-slate-800 ml-3 block text-sm">
                                انا اوفق علي <a href="javascript:void(0);"
                                    class="text-blue-600 font-medium hover:underline ml-1">الشروط والاحكام</a>
                            </label>
                        </div>
                    </div>

                    <div class="mt-12">
                        <button type="button" onclick="document.querySelector('form').submit();"
                            class="w-full py-3 px-4 text-sm tracking-wider font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                            اضف مدرسة
                        </button>
                    </div>
                    <p class="text-slate-800 text-sm mt-6 text-center">سجلت بالفعل مدرسة؟ <a
                            href="{{ route('school.login') }}"
                            class="text-blue-600 font-medium hover:underline ml-1">سجل الدخول هنا</a></p>
             </div>
        </div>
    </form>
</x-guest-layout>
