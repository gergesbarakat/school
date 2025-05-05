<table>

    <thead>
        <tr rowspan='3'>
            <th  colspan='20'>
                تنبيه مهم جدًا</th>
        </tr>
        <tr rowspan='3' >
            <th colspan='20'>
                عند وجود تشابه في الأسماء بين معلمتين مثلا - نوره الحربي حاسب و نوره الحربي لغتي - الحل هنا نكتب اسم
                المعلمة واسم والدها فقط بدون اسم القبيلة فتصبح الأولى - نوره محمد حاسب والثانية نوره عبدالله لغتي -
                والهدف من ذلك حتى لا يصبح هناك خلط في جدول المعلمتين وبالتالي يخرج الجدول وبه أخطاء !!
            </th>
        </tr>
    </thead>
</table>

<table>
    <thead>

        <tr>
            <th>
                م</th>

            <th>
                الاسم</th>
            <th>
                نصابها</th>
            <th>
                يعطي لهم سوابع
            </th>
        </tr>
    </thead>
    <tbody>
        @php  $row = 0;  @endphp
        @if (count($teachers) > 0)
            @foreach ($teachers as $teacher)
                <tr class="odd:bg-gray-100">


                    <td class="rowid px-4 py-2 bg-red-200 text-black border border-lg border-black text-sm">
                        {{ ++$row }}</td>


                    <td class=" border border-lg border-black text-sm">
                        {{ $teacher->name }}
                    </td>
                    <td class=" border border-lg border-black text-sm">
                        {{ $teacher->number_of_classes }}
                    </td>
                    <td class=" border border-lg border-black text-sm">

                        {{ $teacher->no7 }}
                    </td>
                </tr>
            @endforeach

        @endif
    </tbody>
</table>
