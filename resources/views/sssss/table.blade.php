@foreach ($grades as $gid => $grade)
    <table style="border: 3px solid black; border-collapse: collapse; text-align: center;">
        <thead style="background-color: #e6adad;">

            @php
                $clll = $classrooms->where('grade_id', $grade->id)->all();
            @endphp


            <table style="border: 3px solid black; border-collapse: collapse; text-align: center;">
                <thead style="background-color: #e6adad;">
                    <tr>
                        <th colspan="2" style="border: 3px solid black;">{{ $grade->name }}</th>
                    </tr>
                    <tr>
                        <th style="border: 3px solid black;">الصف</th>
                        <th style="border: 3px solid black;">عدد الفصول</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clll as $cid => $c)
                        <tr>
                            <td style="border: 3px solid black;">{{ $c->name }}</td>
                            <td style="border: 3px solid black;">

                                <input type="number" class="pr-3"
                                    name="grade[{{ $grade->id }}][{{ $c->id }}]"
                                    value="{{ count($school_classes->where('school_id', $school_id)->where('grade_id', $grade->id)->where('classroom_id', $c->id)) > 0 ? $school_classes->where('school_id', $school_id)->where('grade_id', $grade->id)->where('classroom_id', $c->id)->first()->number : '' }}"
                                    min="0" max="7">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </thead>
    </table>
@endforeach
