<table>

    <thead>
        <tr>
            <th>← الفصل</th>
        </tr>

        <tr>

            <th>عدد المواد</th>
            <th>المواد</th>
            <th>الحصص</th>

        </tr>
        <tr>

            @php $grade = $grades->where('name', 'المرحلة المتوسطة')    @endphp
            @php $class = $classrooms->where('name', 'ثالث متوسط')     @endphp
            <input type="hidden" name="grade_id" value="{{ $grade->first()->id }}">
            <input type="hidden" name="classroom_id" value="{{ $class->first()->id }}">

            @php $school_classess  = $school_classes->where('grade_id',$grade->first()->id)->where('classroom_id',$class->first()->id)  @endphp
            @if (count(value: $school_classess) > 0)

                @for ($i = 1; $i <= $school_classess->first()->number; $i++)
                    {!! $i == 1 ? '  <th>3/1<br> مثلاً نوره خالد  ' : '' !!}
                    {!! $i == 2 ? '  <th>فصل 3/2<br> مثلاً نوره خالد  ' : '' !!}
                    {!! $i == 3 ? '  <th>فصل 3/3<br> مثلاً نوره خالد  ' : '' !!}
                    {!! $i == 4 ? '  <th>فصل 3/4<br> مثلاً نوره خالد  ' : '' !!}
                    {!! $i == 5 ? '  <th>فصل 3/5<br> مثلاً نوره خالد  ' : '' !!}
                    {!! $i == 6 ? '  <th>فصل 3/6<br> مثلاً نوره خالد  ' : '' !!}
                    {!! $i == 7 ? '  <th>فصل 3/7<br> مثلاً نوره خالد  ' : '' !!}
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
                        {{ $c->teacher_id }} </td>
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
                    <td>
                        {{ $c->teacher_id }} </td>
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
