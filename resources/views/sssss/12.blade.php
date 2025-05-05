
                      @for ($c = 1; $c < 10; $c++)
                        <div class="table-section ">
                            <table class="main-table">
                                <thead  >
                                    <tr class="colored-header-row">

                                        <td   colspan="1">1/{{ $c }}</td>
                                        <td colspan="3">الفصل</td>

                                    </tr>
                                    <tr class="colored-header-row">

                                        <td colspan="1">اسم المعلمة</td>
                                        <td colspan="1">الحصص</td>
                                        <td colspan="1">المواد</td>

                                        <td   colspan="1">عدد المواد</td>

                                    </tr>
                                </thead  >
                                <tbody>
                                    @for ($i = 1; $i < 8; $i++)
                                        <tr>
                                            <?php $classroom = $classrooms->where('name', 'ثاني ثانوي أدبي')->first();

                                            $scc = $schedules
                                                ->where('school_id', $school_id)
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
                                    <tr class="total-hours-row">
                                        <td colspan="4">مجموع الحصص 32</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    @endfor
