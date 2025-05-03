
                    <style>
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
                        <div class="table-section ">
                            <table class="main-table">
                                <thead  >
                                    <tr  >

                                        <td   colspan="1">1/{{ $c }}</td>
                                        <td colspan="3">الفصل</td>

                                    </tr>
                                    <tr  >

                                        <td colspan="1">اسم المعلمة</td>
                                        <td colspan="1">الحصص</td>
                                        <td colspan="1">المواد</td>

                                        <td   colspan="1">عدد المواد</td>

                                    </tr>
                                </thead  >
                                <tbody>
                                    @for ($i = 1; $i < 8; $i++)
                                        <tr>
                                            <?php $classroom = $classrooms->where('name', 'ثالث ثانوي علمي')->first();

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
                                            } else {
                                                $teeee = ' ';
                                                $teec = '  ';
                                            }

                                            ?>
                    <td> {{ $teeee }}
                    </td>
                    <td>5</td>
                    <td>
                         {{ $teec }}
                    </td>
                    <td>{{ $i }}</td>

                                        </tr>
                                    @endfor
                                    <tr  >
                                        <td colspan="4">مجموع الحصص 32</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    @endfor

