<x-guest-layout>
    <!-- Session Status -->
    <div class="flex w-full">

    <div class="flex flex-col justify-center items-center w-1/2">


     <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                أولاً		 قبل البدء في تعبئة الاستمارة يجب عليكِ معرفة نصاب كل معلمة والمواد المسندة لها .

            </div>
            <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
            role="alert">
            ثانيًا		 بعد تعبئة الاستمارة قومي بإرسالها على بريدنا الإلكتروني  jdwli@hotmail.com أو على واتساب 0506000795

        </div>
        <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
        role="alert">
        ثالثًا		 بعد ارسال الاستمارة قومي بتحويل المبلغ إلى أحد حسابتنا البنكية المرسلة لكِ عبر الواتس آب أو تويتر .

    </div>
    <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                رابعًا		 بعد تحويل المبلغ سيتم البدء في تجهيز الجدول فورًا وسيكون الجدول جاهز خلال أقل من 24 ساعة بإذن الله تعالى .

            </div>
            <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
            role="alert">
            خامسًا		 المعلومات الخاطئة تتسب في تأخير تسليم الجدول لكم لذلك نرجوا التأكد من ( اسناد المواد للمعلمات ) قبل الارسال .

        </div>
        <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
        role="alert">
        سادسًا		 للاستفسار أو الملاحظات يمكنكم التواصل معنا ( اتصال - واتس آب ) عبر الرقم  795 6000 050  على مدار الساعة .

    </div>

</div>













    <form method="POST" class="flex flex-col justify-center items-center w-1/2" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>

</x-guest-layout>
