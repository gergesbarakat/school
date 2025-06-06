<x-app-layout>

    <body class="body bg-white dark:bg-[#0F172A]">
        <x-side-bar></x-side-bar>

        <!-- CONTENT -->
        <form method="POST" action="{{ route('schedules.index') }}"
            class="content ml-12 transform ease-in-out duration-500 px-2 md:px-5 pb-4">
            @csrf
            @method('POST')
            <div class="mx-auto">
                <div class = "p-4  mb-4 text-right text-xl text-bold      text-red-700 bg-white border-3xl border border-green-500   dark:bg-red-300     dark:text-red-800"
                    role="alert">
                    اسناد مواد الصف الثالث ثانوي أدبي </div>
                <div class="bg-white flex-wrap p-6 rounded  gap-3 flex flex-row-reverse flex-wrap">
                    <input type="hidden" name="class_id" value="15">
                    <input type="hidden" name="grade_class" value="ثالث ثانوي أدبي">

                    <style>
                        @media (max-width: 768px) {


                            .table-section {
                                min-width: 100%;
                            }
                        }

                        .main-table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-bottom: 20px;
                        }

                        .main-table td,
                        .main-table th {
                            border: 1px solid #ddd;
                            text-align: center;
                        }

                        .main-table thead class="bg-red-300 " td {
                            font-weight: bold;
                            background-color: #f0f0f0;
                        }

                        .class-table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 10px;
                        }

                        .class-table td,
                        .class-table th {
                            border: 1px solid #ddd;
                            padding: 8px;
                            text-align: center;
                        }

                        .class-table thead class="bg-red-300    " td {
                            font-weight: bold;
                            background-color: #f0f0f0;
                        }

                        .class-name-row td {
                            font-weight: bold;
                        }

                        .total-hours-row td {
                            font-weight: bold;
                        }

                        @media (max-width: 768px) {
                            .main-table {
                                display: block;
                                overflow-x: auto;
                            }
                        }

                        /* Add spacing between main tables */
                        .main-table {
                            margin-bottom: 20px;
                            /* Increased spacing */
                        }

                        .class-table {}

                        /* Add spacing and visual separation */
                        .table-section {
                            margin-bottom: 30px;
                            /* Add space between sections */
                            border: 1px solid #ddd;
                            /* Add a border */
                            border-radius: 5px;
                            /* Round the corners */
                            display: inline-block;
                            width: 32%;
                            vertical-align: top;
                            box-sizing: border-box;
                            /* Include padding and border in element's total width and height */
                        }

                        .main-table {
                            border: none;
                        }

                        .top-header td {
                            font-size: 14px;
                        }

                        input {
                            width: 100%;
                            /* Make input fields fill their cells */
                            padding: 5px;
                            box-sizing: border-box;
                            /* Include padding and border in element's total width and height */
                            border: none;
                            /* Remove the default border */
                            text-align: center;
                            /* Center the input text */
                        }

                        .colored-header-row {}

                        .tables-container {
                            display: flex;
                            flex-direction: row-reverse;
                            /* ترتيب الجداول من اليمين إلى اليسار */
                            flex-wrap: wrap;
                            /* السماح للجداول بالانتقال إلى السطر التالي في حالة عدم توفر مساحة كافية */
                            justify-content: flex-start;
                            /* محاذاة الجداول إلى بداية الحاوية (اليمين في هذه الحالة) */
                        }
                    </style>
                    @for ($c = 1; $c < 10; $c++)
                        @if ($c == 1)
                            @php $color = '#C5D9F1'; @endphp
                        @elseif($c == 2)
                            @php $color = '#E6B8B7'; @endphp
                        @elseif($c == 3)
                            @php $color = '#B1A0C7'; @endphp
                        @elseif($c == 4)
                            @php $color = '#FCD5B4'; @endphp
                        @elseif($c == 5)
                            @php $color = '#C4D79B'; @endphp
                        @elseif($c == 6)
                            @php $color = '#FFC000'; @endphp
                        @elseif($c == 7)
                            @php $color = '#FFFF00'; @endphp
                        @elseif($c == 8)
                            @php $color = '#92CDDC'; @endphp
                        @elseif($c == 9)
                            @php $color = '#BFBFBF'; @endphp
                        @endif
                        <div class="table-section ">
                            <table class="main-table">
                                <thead class="bg-[#EEECE1]    ">
                                    <tr class="colored-header-row">

                                        <td class="bg-[{{ $color }}] " colspan="1">{{ $c }}/3</td>
                                        <td colspan="3" class="bg-[#ffffff] ">الفصل</td>

                                    </tr>
                                    <tr class="colored-header-row">

                                        <td colspan="1">اسم المعلمة</td>
                                        <td colspan="1">الحصص</td>
                                        <td colspan="1">المواد</td>

                                        <td class=" " colspan="1">عدد المواد</td>

                                    </tr>
                                </thead class="bg-red-300   ">
                                <tbody>
                                    @for ($i = 1; $i < 8; $i++)
                                        <tr>
                                            <?php $classroom = $classrooms->where('name', 'ثالث ثانوي أدبي')->first();
                                            
                                            $scc = $schedules
                                                ->where('school_id', Auth::guard('school')->user()->id)
                                                ->where('row_id', $i)
                                                ->where('class_id', $c)
                                                ->where('grade_id', $classroom->grade_id)
                                                ->where('classroom_id', $classroom->id)
                                                ->first();
                                            if (isset($scc) && $scc != null) {
                                                $teeee = $scc->teacher_id;
                                                $teec = $scc->subject_id;
                                                $asdasdsad = $scc->schedule_data;
                                            } else {
                                                $teeee = ' ';
                                                $teec = '  ';
                                                $asdasdsad = ' ';
                                            }
                                            
                                            ?>
                                            <td><select
                                                    name="class[{{ $c }}][{{ $i }}][teacher_id]"
                                                    class="p-2">
                                                    <option></option>
                                                    @foreach ($teachers as $teacher)
                                                        <option value="{{ $teacher->name }}"
                                                            {{ $teeee == $teacher->name ? 'selected' : '' }}>
                                                            {{ $teacher->name }}
                                                        </option>
                                                    @endforeach

                                                </select></td>
                                            <td class="bg-[#EEECE1] m-0"><select
                                                    name="class[{{ $c }}][{{ $i }}][number]"
                                                    class="p-2   bg-[#EEECE1] m-0">
                                                    <option></option>
                                                    @for ($o = 1; $o < 8; $o++)
                                                        <option value="{{ $o }}"
                                                            {{ $asdasdsad == $o ? 'selected' : '' }}>
                                                            {{ $o }}
                                                        </option>
                                                    @endfor

                                                </select></td>
                                            <td><input
                                                    name='class[{{ $c }}][{{ $i }}][subject_id]'
                                                    type="text" value="{{ $teec }}">
                                            </td>
                                            <td class="bg-[#EEECE1]">{{ $i }}</td>

                                        </tr>
                                    @endfor
                                    <tr class="total-hours-row bg-[#4F6228] ">
                                        <td colspan="4" class="p-2 text-white">مجموع الحصص 32</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    @endfor

                    <div class="w-full mt-6 p-4 flex-row-reverse flex gap-2">
                        <div class=" flex w-1/2   justify-start">
                            <a href="{{ route('schedules.index', ['class_id' => '13']) }}"
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
            </div>


        </form>

    </body>



</x-app-layout>
