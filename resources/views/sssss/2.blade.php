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

            @php $grade = $grades->where('name', 'المرحلة الابتدائية') @endphp
            @php $class = $classrooms->where('name', 'ثاني ابتدائي') @endphp
            <input type="hidden" name="grade_id" value="{{ $grade->first()->id }}">
            <input type="hidden" name="classroom_id" value="{{ $class->first()->id }}">

            @php $school_classess = $school_classes->where('grade_id', $grade->first()->id)->where('classroom_id', $class->first()->id); @endphp
            @if (count(value: $school_classess) > 0)

                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    {!! $i == 1 ? ' <th>فصل ثاني ( أ )<br> مثلاً نوره خالد ' : '' !!}
                    {!! $i == 2
                        ? '
                                                                                            <th>فصل ثاني ( ب )<br> مثلاً نوره خالد '
                        : '' !!}
                    {!! $i == 3
                        ? '
                                                                                            <th>فصل ثاني ( ج )<br> مثلاً نوره خالد '
                        : '' !!}
                    {!! $i == 4
                        ? '
                                                                                            <th>فصل ثاني ( د )<br> مثلاً نوره خالد '
                        : '' !!}
                    {!! $i == 5
                        ? '
                                                                                            <th>فصل ثاني ( ه )<br> مثلاً نوره خالد '
                        : '' !!}
                    {!! $i == 6
                        ? '
                                                                                            <th>فصل ثاني ( و )<br> مثلاً نوره خالد '
                        : '' !!}
                    {!! $i == 7
                        ? '
                                                                                            <th>فصل ثاني ( ز )<br> مثلاً نوره خالد '
                        : '' !!}
                @endfor
            @endif
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>د إسلامية</td>
            <td>5</td>
            @if (count(value: $school_classess) > 0)

                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    <?php
                    $c = $schedules
                        ->where('row_id', 1)
                        ->where('class_id', $i)
                        ->where('grade_id', $grade->first()->id)
                        ->where('classroom_id', $class->first()->id)
                        ->first();
                    ?>
                    <td>
                        {{ $c->teacher_id }} </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td>2</td>
            <td>لغتي</td>
            <td>8</td>

            @if (count(value: $school_classess) > 0)

                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    <?php
                    $c = $schedules
                        ->where('row_id', 2)
                        ->where('class_id', $i)
                        ->where('grade_id', $grade->first()->id)
                        ->where('classroom_id', $class->first()->id)
                        ->first();
                    ?>
                    <td>
                        {{ $c->teacher_id }} </td>
                @endfor
            @endif

        </tr>
        <tr>
            <td>3</td>
            <td>رياضيات</td>
            <td>5</td>
            @if (count(value: $school_classess) > 0)

                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    <?php
                    $c = $schedules
                        ->where('row_id', 1)
                        ->where('class_id', $i)
                        ->where('grade_id', $grade->first()->id)
                        ->where('classroom_id', $class->first()->id)
                        ->first();
                    ?>
                    <td>
                        {{ $c->teacher_id }}
                    </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td>4</td>
            <td>علوم</td>
            <td>3</td>
            @if (count(value: $school_classess) > 0)

                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    <?php
                    $c = $schedules
                        ->where('row_id', 4)
                        ->where('class_id', $i)
                        ->where('grade_id', $grade->first()->id)
                        ->where('classroom_id', $class->first()->id)
                        ->first();
                    ?>
                    <td> {{ $c->teacher_id }}
                    </td>
                @endfor
                @endif
        </tr>
        <tr>
            <td>5</td>
            <td>E</td>
            <td>3</td>
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
                    <td>
                        {{ $c->teacher_id }} </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td>6</td>
            <td>فنية</td>
            <td>2</td>
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
                    <td>
                        {{ $c->teacher_id }} </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td>7</td>
            <td>بدنية</td>
            <td>3</td>
            @if (count(value: $school_classess) > 0)

                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    <?php
                    $c = $schedules
                        ->where('row_id', 7)
                        ->where('class_id', $i)
                        ->where('grade_id', $grade->first()->id)
                        ->where('classroom_id', $class->first()->id)
                        ->first();
                    ?>
                    <td>
                        {{ $c->teacher_id }} </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td>8</td>
            <td>مهارات</td>
            <td>1</td>
            @if (count(value: $school_classess) > 0)

                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    <?php
                    $c = $schedules
                        ->where('row_id', 8)
                        ->where('class_id', $i)
                        ->where('grade_id', $grade->first()->id)
                        ->where('classroom_id', $class->first()->id)
                        ->first();
                    ?>
                    <td>
                        {{ $c->teacher_id }} </td>
                @endfor

            @endif
        </tr>
    </tbody>
    <tfoot>
        <tr class="total-row">
            <td colspan="3">مجموع الحصص 30</td>
            <td colspan="7"></td>
        </tr>
    </tfoot>
</table>
