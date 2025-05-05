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
            class="flex  flex-row-reverse justify-center items-center gap-2 w-full flex-wrap ml-6 mb-4 ">
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
                            <select name='area' class="w-full h-full px-4 py-2">
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمنطقة الرياض') ? '  selected' : '' }}>
                                    إدارة التعليم بمنطقة الرياض </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمنطقة الجوف') ? '  selected' : '' }}>
                                    إدارة التعليم بمنطقة الجوف </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمنطقة الحدود الشمالية') ? '  selected' : '' }}>
                                    إدارة التعليم بمنطقة الحدود الشمالية </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة القريات') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة القريات </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمنطقة تبوك') ? '  selected' : '' }}>
                                    إدارة التعليم بمنطقة تبوك </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمنطقة حائل') ? '  selected' : '' }}>
                                    إدارة التعليم بمنطقة حائل </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بحفر الباطن') ? '  selected' : '' }}>
                                    إدارة التعليم بحفر الباطن </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بالمنطقة الشرقية') ? '  selected' : '' }}>
                                    إدارة التعليم بالمنطقة الشرقية </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة الأحساء') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة الأحساء </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة الخرج') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة الخرج </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة شقراء') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة شقراء </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة الدوادمي') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة الدوادمي </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة القويعية') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة القويعية </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة المجمعة') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة المجمعة </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظتي حوطة بني تميم والحريق') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظتي حوطة بني تميم والحريق </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمنطقة القصيم') ? '  selected' : '' }}>
                                    إدارة التعليم بمنطقة القصيم </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة الغاط') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة الغاط </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة البكيرية') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة البكيرية </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة الرس') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة الرس </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة المذنب') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة المذنب </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة عنيزة') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة عنيزة </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة الأفلاج') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة الأفلاج </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة عفيف') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة عفيف </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة الزلفي') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة الزلفي </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة وادي الدواسر') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة وادي الدواسر </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمنطقة المدينة المنورة') ? '  selected' : '' }}>
                                    إدارة التعليم بمنطقة المدينة المنورة </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة المهد') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة المهد </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة العلا') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة العلا </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة ينبع') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة ينبع </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة الطائف') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة الطائف </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمنطقة مكة المكرمة') ? '  selected' : '' }}>
                                    إدارة التعليم بمنطقة مكة المكرمة </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة القنفذة') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة القنفذة </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة الليث') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة الليث </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمنطقة الباحة') ? '  selected' : '' }}>
                                    إدارة التعليم بمنطقة الباحة </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة جدة') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة جدة </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة بيشة') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة بيشة </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة بالمخواة') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة بالمخواة </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة النماص') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة النماص </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمنطقة عسير') ? '  selected' : '' }}>
                                    إدارة التعليم بمنطقة عسير </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة رجال ألمع') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة رجال ألمع </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحايل عسير') ? '  selected' : '' }}>
                                    إدارة التعليم بمحايل عسير </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمنطقة نجران') ? '  selected' : '' }}>
                                    إدارة التعليم بمنطقة نجران </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة سراة عبيدة') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة سراة عبيدة </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمنطقة جازان') ? '  selected' : '' }}>
                                    إدارة التعليم بمنطقة جازان </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة التعليم بمحافظة صبيا') ? '  selected' : '' }}>
                                    إدارة التعليم بمحافظة صبيا </option>
                                <option
                                    {{ $schools->find(Auth::guard('school')->user()->id)->area == trim('إدارة تعليم محافظة ظهران الجنوب') ? '  selected' : '' }}>
                                    إدارة تعليم محافظة ظهران الجنوب </option>
                                <option>إدارة التعليم بمحافظة شرورة</option>
                            </select>
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
                            <input type="text"
                                {{ $schools->find(Auth::guard('school')->user()->id)->phone ? '  value=' . $schools->find(Auth::guard('school')->user()->id)->phone : '' }}
                                name="phone" style="width: 90%;">

                        </td>
                    </tr>
                </tbody>
            </table>

            <input type="submit"
                class="w-3/4 text-2xl	 my-4 rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center   text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2"
                value="التالي">


        </form>


</x-app-layout>
