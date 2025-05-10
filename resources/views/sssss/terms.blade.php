<table id='asd' dir="rtl">
    <thead>
        <tr>
            <th style="border: 1px solid #000;">
                م</th>

            <th style="border: 1px solid #000;">
                الشرط</th>
        </tr>
    </thead>
    <tbody>
        @php $row = 0;  @endphp
        @if (count($terms) > 0)
            @foreach ($terms as $term)
                <tr>


                    <td style="border: 1px solid #000;">
                        {{ ++$row }}</td>

                    <td style="border: 1px solid #000;">
                        {{ $term->text }}
                    </td>

                </tr>
            @endforeach


        @endif
    </tbody>
</table>
