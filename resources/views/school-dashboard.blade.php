<x-app-layout>

    <x-side-bar>

    </x-side-bar>
    <!-- CONTENT -->
    <div class="flex flex-col justify-center items-center w-full ml-6 p-10">
        <div class = "p-4    text-3xl text-bold      text-red-700 bg-white border-3xl border border-green-500 rounded-lg dark:bg-red-200 dark:text-red-800"
            role="alert">
            نموذج خاص بتجهيز الجدول المدرسي
        </div>
        <div class = "p-4    text-xl text-bold    m-2  text-red-700 bg-white border-3xl border border-green-500 rounded-lg dark:bg-red-200 dark:text-red-800"
            role="alert">
            مدارس البنات ( عام )
        </div>

        @php $a = 0; @endphp
        <form method="GET" action="{{ route('teachers.index') }}"
            class="flex  justify-center items-center gap-2 w-full flex-wrap ml-6 mb-4 ">
            @csrf
            <div class = "p-4  text-right w-2/6 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                أولاً قبل البدء في تعبئة الاستمارة يجب عليكِ معرفة نصاب كل معلمة والمواد المسندة لها .

            </div>
            <div class = "p-4  text-right w-2/6 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                ثانيًا بعد تعبئة الاستمارة قومي بإرسالها على بريدنا الإلكتروني jdwli@hotmail.com أو على واتساب
                0506000795

            </div>
            <div class = "p-4  text-right w-2/6 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                ثالثًا بعد ارسال الاستمارة قومي بتحويل المبلغ إلى أحد حسابتنا البنكية المرسلة لكِ عبر الواتس آب أو تويتر
                .

            </div>
            <div class = "p-4  text-right w-2/6 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                رابعًا بعد تحويل المبلغ سيتم البدء في تجهيز الجدول فورًا وسيكون الجدول جاهز خلال أقل من 24 ساعة بإذن
                الله تعالى .

            </div>
            <div class = "p-4  text-right w-2/6 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                خامسًا المعلومات الخاطئة تتسب في تأخير تسليم الجدول لكم لذلك نرجوا التأكد من ( اسناد المواد للمعلمات )
                قبل الارسال .

            </div>
            <div class = "p-4  text-right w-2/6 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                سادسًا للاستفسار أو الملاحظات يمكنكم التواصل معنا ( اتصال - واتس آب ) عبر الرقم 795 6000 050 على مدار
                الساعة .

            </div>
            <table dir="rtl"
                style="width: 50%; text-align: center; border-collapse: collapse; border: 1px solid #000;">
                <thead style="background-color: #f8d7da;">
                    <tr>
                        <th style="border: 1px solid #000;">رقم</th>
                        <th style="border: 1px solid #000;">البند</th>
                        <th style="border: 1px solid #000;">الإدخال</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #000;">1</td>
                        <td style="border: 1px solid #000;">اسم المدرسة</td>
                        <td style="border: 1px solid #000;">
                            <input type="hidden" name="name"
                                value="{{ $schools->find(Auth::guard('school')->user()->id)->name }}">
                            {{ $schools->find(Auth::guard('school')->user()->id)->name ? $schools->find(Auth::guard('school')->user()->id)->name : '' }}
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;">2</td>
                        <td style="border: 1px solid #000;">المنطقة التعليمية</td>
                        <td style="border: 1px solid #000;">

                            <input type="text"
                                {{ $schools->find(Auth::guard('school')->user()->id)->area ? '  value=' . $schools->find(Auth::guard('school')->user()->id)->area : '' }}
                                name="area" style="width: 90%;">
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;">3</td>
                        <td style="border: 1px solid #000;">عدد فصول المدرسة</td>
                        <td style="border: 1px solid #000;">
                            <input type="number" min="1"
                                {{ $schools->find(Auth::guard('school')->user()->id)->number_of_classes ? '  value=' . $schools->find(Auth::guard('school')->user()->id)->number_of_classes : '' }}
                                name="number_of_classes" style="width: 90%;">

                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;">4</td>
                        <td style="border: 1px solid #000;">اسم مسؤولة الجدول</td>
                        <td style="border: 1px solid #000;">


                            <input type="text"
                                {{ $schools->find(Auth::guard('school')->user()->id)->manager_name ? '  value=' . $schools->find(Auth::guard('school')->user()->id)->manager_name : '' }}
                                name="manager_name" style="width: 90%;">
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;">5</td>
                        <td style="border: 1px solid #000;">جوال للتواصل</td>
                        <td style="border: 1px solid #000;">
                <input type="text"   {{ $schools->find(Auth::guard('school')->user()->id)->phone ? '  value=' . $schools->find(Auth::guard('school')->user()->id)->phone : '' }} name="phone" style="width: 90%;">

                        </td>
                    </tr>
                </tbody>
            </table>

            <input type="submit"
                class="w-3/4 text-2xl	 my-4 rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center   text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2"
                value="التالي">


        </form>



</x-app-layout>
