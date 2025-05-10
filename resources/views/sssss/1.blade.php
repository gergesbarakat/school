<table>

    <thead style="border: 1px solid #000;">
        <tr>

            <th style="border: 1px solid #000;" rowspan="2">عدد
                المواد</th>
            <th style="border: 1px solid #000;" rowspan="2">المواد</th>
            <th style="border: 1px solid #000;" rowspan="2">الحصص</th>
            <th style="border: 1px solid #000;" colspan="7">← الفصل</th>

        </tr>
        <tr>

            @php $grade = $grades->where('name', 'المرحلة الابتدائية')    @endphp
            @php $class = $classrooms->where('name', 'اول ابتدائي')    @endphp
            <input type="hidden" name="grade_id" value="{{ $grade->first()->id }}">
            <input type="hidden" name="classroom_id" value="{{ $class->first()->id }}">

            @php $school_classess  = $school_classes->where('grade_id',$grade->first()->id)->where('classroom_id',$class->first()->id)  @endphp

            @if (count($school_classess) > 0)
                @if (count($school_classess) > 0)
                    @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                        {!! $i == 1 ? '  <th style="border: 1px solid #000;">فصل أول ( أ )<br> مثلاً نوره خالد  ' : '' !!}
                        {!! $i == 2 ? '  <th style="border: 1px solid #000;">فصل أول ( ب )<br> مثلاً نوره خالد  ' : '' !!}
                        {!! $i == 3 ? '  <th style="border: 1px solid #000;">فصل أول ( ج )<br> مثلاً نوره خالد  ' : '' !!}
                        {!! $i == 4 ? '  <th style="border: 1px solid #000;">فصل أول ( د )<br> مثلاً نوره خالد  ' : '' !!}
                        {!! $i == 5 ? '  <th style="border: 1px solid #000;">فصل أول ( ه )<br> مثلاً نوره خالد  ' : '' !!}
                        {!! $i == 6 ? '  <th style="border: 1px solid #000;">فصل أول ( و )<br> مثلاً نوره خالد  ' : '' !!}
                        {!! $i == 7 ? '  <th style="border: 1px solid #000;">فصل أول ( ز )<br> مثلاً نوره خالد  ' : '' !!}
                    @endfor
                @endif


            @endif
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid #000;">1</td>
            <td style="border: 1px solid #000;">د إسلامية</td>
            <td style="border: 1px solid #000;">5</td>
            @if (count($school_classess) > 0)
                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    <?php
                    $c = $schedules
                        ->where('row_id', 1)
                        ->where('class_id', $i)
                        ->where('grade_id', $grade->first()->id)
                        ->where('classroom_id', $class->first()->id)
                        ->first();
                    ?>

                    <td style="border: 1px solid #000;"> {{ $c != null ? $c->teacher_id : '' }} </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td style="border: 1px solid #000;">2</td>
            <td style="border: 1px solid #000;">لغتي</td>
            <td style="border: 1px solid #000;">8</td>

            @if (count($school_classess) > 0)
                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    <?php
                    $c = $schedules
                        ->where('row_id', 2)
                        ->where('class_id', $i)
                        ->where('grade_id', $grade->first()->id)
                        ->where('classroom_id', $class->first()->id)
                        ->first();
                    ?>
                    <td style="border: 1px solid #000;"> {{ $c != null ? $c->teacher_id : '' }} </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td style="border: 1px solid #000;">3</td>
            <td style="border: 1px solid #000;">رياضيات</td>
            <td style="border: 1px solid #000;">5</td>
            @if (count($school_classess) > 0)
                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    <?php
                    $c = $schedules
                        ->where('row_id', 3)
                        ->where('class_id', $i)
                        ->where('grade_id', $grade->first()->id)
                        ->where('classroom_id', $class->first()->id)
                        ->first();
                    ?>
                    <td style="border: 1px solid #000;"> {{ $c != null ? $c->teacher_id : '' }} </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td style="border: 1px solid #000;">4</td>
            <td style="border: 1px solid #000;">علوم</td>
            <td style="border: 1px solid #000;">3</td>
            @if (count($school_classess) > 0)
                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    <?php
                    $c = $schedules
                        ->where('row_id', 4)
                        ->where('class_id', $i)
                        ->where('grade_id', $grade->first()->id)
                        ->where('classroom_id', $class->first()->id)
                        ->first();
                    ?>
                    <td style="border: 1px solid #000;"> {{ $c != null ? $c->teacher_id : '' }} </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td style="border: 1px solid #000;">5</td>
            <td style="border: 1px solid #000;">E</td>
            <td style="border: 1px solid #000;">3</td>
            @if (count(value: $school_classess) > 0)
                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    <?php
                    $c = $schedules
                        ->where('row_id', 5)
                        ->where('class_id', $i)
                        ->where('grade_id', $grade->first()->id)
                        ->where('classroom_id', $class->first()->id)
                        ->first();
                    ?>
                    <td style="border: 1px solid #000;"> {{ $c != null ? $c->teacher_id : '' }} </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td style="border: 1px solid #000;">6</td>
            <td style="border: 1px solid #000;">فنية</td>
            <td style="border: 1px solid #000;">2</td>
            @if (count(value: $school_classess) > 0)
                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    <?php
                    $c = $schedules
                        ->where('row_id', 6)
                        ->where('class_id', $i)
                        ->where('grade_id', $grade->first()->id)
                        ->where('classroom_id', $class->first()->id)
                        ->first();
                    ?>
                    <td style="border: 1px solid #000;"> {{ $c != null ? $c->teacher_id : '' }} </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td style="border: 1px solid #000;">7</td>
            <td style="border: 1px solid #000;">بدنية</td>
            <td style="border: 1px solid #000;">3</td>
            @if (count($school_classess) > 0)
                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    <?php
                    $c = $schedules
                        ->where('row_id', 7)
                        ->where('class_id', $i)
                        ->where('grade_id', $grade->first()->id)
                        ->where('classroom_id', $class->first()->id)
                        ->first();
                    ?>
                    <td style="border: 1px solid #000;"> {{ $c != null ? $c->teacher_id : '' }} </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td style="border: 1px solid #000;">8</td>
            <td style="border: 1px solid #000;">مهارات</td>
            <td style="border: 1px solid #000;">1</td>
            @if (count($school_classess) > 0)
                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    <?php
                    $c = $schedules
                        ->where('row_id', 8)
                        ->where('class_id', $i)
                        ->where('grade_id', $grade->first()->id)
                        ->where('classroom_id', $class->first()->id)
                        ->first();
                    ?>
                    <td style="border: 1px solid #000;"> {{ $c != null ? $c->teacher_id : '' }} </td>
                @endfor
            @endif
        </tr>
    </tbody>
    <tfoot>
        <tr class="total-row">
            <td style="border: 1px solid #000;" colspan="3">مجموع الحصص 30</td>
            <td style="border: 1px solid #000;" colspan="7"></td>
        </tr>
    </tfoot>
</table>
