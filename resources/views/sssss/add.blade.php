<table dir="rtl" style="width: 50%; text-align: center; border-collapse: collapse; border: 1px solid #000;">

    <thead >
        <tr style="background-color: #f8d7da;">
            <th colspan='7'>
                أولاً قبل البدء في تعبئة الاستمارة يجب عليكِ معرفة نصاب كل معلمة والمواد المسندة لها .

            </th>
        </tr>
        <tr>
            <th colspan='7'>
                ثانيًا بعد تعبئة الاستمارة قومي بإرسالها على بريدنا الإلكتروني jdwli@hotmail.com أو على واتساب
                0506000795

            </th>
        </tr>
        <tr>
            <th colspan='7'>
                ثالثًا بعد ارسال الاستمارة قومي بتحويل المبلغ إلى أحد حسابتنا البنكية المرسلة لكِ عبر الواتس آب أو تويتر
                .

            </th>
        </tr>
        <tr>
            <th colspan='7'>
                رابعًا بعد تحويل المبلغ سيتم البدء في تجهيز الجدول فورًا وسيكون الجدول جاهز خلال أقل من 24 ساعة بإذن
                الله تعالى .

            </th>
        </tr>
        <tr>
            <th colspan='7'>
                خامسًا المعلومات الخاطئة تتسب في تأخير تسليم الجدول لكم لذلك نرجوا التأكد من ( اسناد المواد للمعلمات )
                قبل الارسال .

            </th>
        </tr>
        <tr>
            <th colspan='7'>
                سادسًا للاستفسار أو الملاحظات يمكنكم التواصل معنا ( اتصال - واتس آب ) عبر الرقم 795 6000 050 على مدار
                الساعة .

            </th>
        </tr>
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
                {{ $schools->find($school_id)->name }}
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;">2</td>
            <td style="border: 1px solid #000;">المنطقة التعليمية</td>
            <td style="border: 1px solid #000;">
                {{ $schools->find($school_id)->area }}
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;">3</td>
            <td style="border: 1px solid #000;">عدد فصول المدرسة</td>
            <td style="border: 1px solid #000;">
                {{ $schools->find($school_id)->number_of_classes }}

            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;">4</td>
            <td style="border: 1px solid #000;">اسم مسؤولة الجدول</td>
            <td style="border: 1px solid #000;">


                {{ $schools->find($school_id)->manager_name }}
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;">5</td>
            <td style="border: 1px solid #000;">جوال للتواصل</td>
            <td style="border: 1px solid #000;">
                {{ $schools->find($school_id)->phone }}
            </td>
        </tr>
    </tbody>
</table>
