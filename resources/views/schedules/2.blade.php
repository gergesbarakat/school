<x-app-layout>

    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>

        <!-- CONTENT -->
        <form method="GET" action="{{ route('schedules.index') }}"
            class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            @csrf
            <div class="mx-auto">
                <div class = "p-4  mb-4 text-right text-xl text-bold      text-red-700 bg-white border-3xl border border-green-500   dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    اسناد مواد الصف الثاني الابـتدائي
                </div>
                 <div class="bg-white p-6 rounded shadow-md">
                    <input type="hidden" name="class_id" value="3">
                    <style>
                        table {
                            border-collapse: collapse;
                            width: 100%;
                            direction: rtl;
                            text-align: center;
                        }

                        th,
                        td {
                            border: 2px solid black;
                            padding: 8px;
                        }

                        thead th {
                            background-color: #f9d5d5;
                        }

                        .total-row {
                            font-weight: bold;
                            color: red;
                        }

                        input {
                            border: none;
                            text-align: center;
                            width: 100%;
                        }
                    </style>
                    <table>

                        <thead>
                            <tr>

                                <th rowspan="2">عدد المواد</th>
                                <th rowspan="2">المواد</th>
                                <th rowspan="2">الحصص</th>
                                <th colspan="7">← الفصل</th>

                            </tr>
                            <tr>

                                @php $grade = $grades->where('name', 'المرحلة الابتدائية')    @endphp
                                @php $class = $classrooms->where('name', 'ثاني ابتدائي')    @endphp
                                <input type="hidden" name="grade_id" value="{{ $grade->first()->id }}">
                                <input type="hidden" name="classroom_id" value="{{ $class->first()->id }}">

                                @php $school_classess  = $school_classes->where('grade_id',$grade->first()->id)->where('classroom_id',$class->first()->id)  @endphp
                                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                                    {!! $i == 1 ? '  <th>فصل ثاني ( أ )<br> مثلاً نوره خالد  ' : '' !!}
                                    {!! $i == 2 ? '  <th>فصل ثاني ( ب )<br> مثلاً نوره خالد  ' : '' !!}
                                    {!! $i == 3 ? '  <th>فصل ثاني ( ج )<br> مثلاً نوره خالد  ' : '' !!}
                                    {!! $i == 4 ? '  <th>فصل ثاني ( د )<br> مثلاً نوره خالد  ' : '' !!}
                                    {!! $i == 5 ? '  <th>فصل ثاني ( ه )<br> مثلاً نوره خالد  ' : '' !!}
                                    {!! $i == 6 ? '  <th>فصل ثاني ( و )<br> مثلاً نوره خالد  ' : '' !!}
                                    {!! $i == 7 ? '  <th>فصل ثاني ( ز )<br> مثلاً نوره خالد  ' : '' !!}
                                @endfor

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>د إسلامية</td>
                                <td>5</td>
                                 @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                                    <?php
                                    $a = $schedules
                                        ->where('row_id', 1)
                                        ->where('class_id', $i)
                                        ->where('grade_id', $grade->first()->id)
                                        ->where('classroom_id', $class->first()->id)
                                        ->first();
                                    ?>
                                    <td><select name="col[{{ $i }}][1]" class="p-2">

                                            <option></option>

                                            @foreach ($teachers as $teacher)
                                                <option
                                                    {{ $a != null && $a->teacher_id != null && $a->teacher_id == $teacher->name ? 'selected' : '' }}
                                                    value="    {{ $teacher->name }}">
                                                    {{ $teacher->name }}</option>
                                            @endforeach
                                        </select></td>
                                @endfor
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>لغتي</td>
                                <td>8</td>

                                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                                    <?php
                                    $b = $schedules
                                        ->where('row_id', 2)
                                        ->where('class_id', $i)
                                        ->where('grade_id', $grade->first()->id)
                                        ->where('classroom_id', $class->first()->id)
                                        ->first();
                                    ?>
                                    <td><select name="col[{{ $i }}][2]" class="p-2">
                                            <option></option>


                                            @foreach ($teachers as $teacher)
                                                <option
                                                    {{ $b != null && $b->teacher_id == $teacher->name ? 'selected' : '' }}
                                                    value="    {{ $teacher->name }}">
                                                    {{ $teacher->name }}</option>
                                            @endforeach
                                        </select></td>
                                @endfor

                            </tr>
                            <tr>
                                <td>3</td>
                                <td>رياضيات</td>
                                <td>5</td>
                                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                                <?php
                                    $c = $schedules
                                        ->where('row_id', 1)
                                        ->where('class_id', $i)
                                        ->where('grade_id', $grade->first()->id)
                                        ->where('classroom_id', $class->first()->id)
                                        ->first();
                                     ?>
                                    <td><select name="col[{{ $i }}][3]" class="p-2">
                                            <option></option>


                                            @foreach ($teachers as $teacher)
                                                <option
                                                    {{ $c != null && $c->teacher_id == $teacher->name ? 'selected' : '' }}
                                                    value="    {{ $teacher->name }}">
                                                    {{ $teacher->name }}</option>
                                            @endforeach
                                        </select></td>
                                @endfor
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>علوم</td>
                                <td>3</td>
                                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                                    <?php
                                    $d = $schedules
                                        ->where('row_id', 4)
                                        ->where('class_id', $i)
                                        ->where('grade_id', $grade->first()->id)
                                        ->where('classroom_id', $class->first()->id)
                                        ->first();
                                    ?>
                                    <td><select name="col[{{ $i }}][4]" class="p-2">
                                            <option></option>



                                            @foreach ($teachers as $teacher)
                                                <option
                                                    {{ $d != null && $d->teacher_id == $teacher->name ? 'selected' : '' }}
                                                    value="    {{ $teacher->name }}">
                                                    {{ $teacher->name }}</option>
                                            @endforeach
                                        </select></td>
                                @endfor
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>E</td>
                                <td>3</td>
                                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                                    <?php
                                    $e = $schedules
                                        ->where('row_id', 5)
                                        ->where('class_id', $i)
                                        ->where('grade_id', $grade->first()->id)
                                        ->where('classroom_id', $class->first()->id)
                                        ->first();
                                    ?>
                                    <td><select name="col[{{ $i }}][5]" class="p-2">
                                            <option></option>


                                            @foreach ($teachers as $teacher)
                                                <option
                                                    {{ $e != null && $e->teacher_id == $teacher->name ? 'selected' : '' }}
                                                    value="    {{ $teacher->name }}">
                                                    {{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                @endfor
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>فنية</td>
                                <td>2</td>
                                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                                    <?php
                                    $f = $schedules
                                        ->where('row_id', 6)
                                        ->where('class_id', $i)
                                        ->where('grade_id', $grade->first()->id)
                                        ->where('classroom_id', $class->first()->id)
                                        ->first();
                                    ?>
                                    <td><select name="col[{{ $i }}][6]" class="p-2">
                                            <option></option>


                                            @foreach ($teachers as $teacher)
                                                <option
                                                    {{ $f != null && $f->teacher_id == $teacher->name ? 'selected' : '' }}
                                                    value="    {{ $teacher->name }}">
                                                    {{ $teacher->name }}</option>
                                            @endforeach
                                        </select></td>
                                @endfor
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>بدنية</td>
                                <td>3</td>
                                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                                    <?php
                                    $e = $schedules
                                        ->where('row_id', 7)
                                        ->where('class_id', $i)
                                        ->where('grade_id', $grade->first()->id)
                                        ->where('classroom_id', $class->first()->id)
                                        ->first();
                                    ?>
                                    <td><select name="col[{{ $i }}][7]" class="p-2">
                                            <option></option>


                                            @foreach ($teachers as $teacher)
                                                <option
                                                    {{ $e != null && $e->teacher_id == $teacher->name ? 'selected' : '' }}
                                                    value="    {{ $teacher->name }}">
                                                    {{ $teacher->name }}</option>
                                            @endforeach
                                        </select></td>
                                @endfor
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>مهارات</td>
                                <td>1</td>
                                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                                    <?php
                                    $g = $schedules
                                        ->where('row_id', 8)
                                        ->where('class_id', $i)
                                        ->where('grade_id', $grade->first()->id)
                                        ->where('classroom_id', $class->first()->id)
                                        ->first();
                                    ?>
                                    <td><select name="col[{{ $i }}][8]" class="p-2">
                                            <option></option>


                                            @foreach ($teachers as $teacher)
                                                <option
                                                    {{ $g != null && $g->teacher_id == $teacher->name ? 'selected' : '' }}
                                                    value="    {{ $teacher->name }}">
                                                    {{ $teacher->name }}</option>
                                            @endforeach
                                        </select></td>
                                @endfor
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="total-row">
                                <td colspan="3">مجموع الحصص 30</td>
                                <td colspan="7"></td>
                            </tr>
                        </tfoot>
                    </table>

                </div>

            </div>
            <div class="w-full mt-6 p-4 flex-row-reverse flex gap-2">
                <div class=" flex w-1/2   justify-start">
                    <a href="{{ url()->previous() }}"
                        class="bg-[#1E293B] text-center w-full text-xl text-white px-4 py-2   hover:bg-blue-600">
                        السابق
                    </a>
                </div>
                <div class="flex  w-1/2        justify-start">
                    <input type="submit" value='التالي '
                        class='bg-[#1E293B] text-center w-full text-xl text-white px-4 py-2   hover:bg-blue-600'
                        name="" id="">
                </div>



            </div>
            </div>

    </body>



</x-app-layout>
