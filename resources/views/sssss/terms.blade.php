<table id='asd' dir="rtl">
    <thead>
        <tr>
            <th>
                م</th>

            <th>
                الشرط</th>
        </tr>
    </thead>
    <tbody>
        @php $row = 0;  @endphp
            @if(count($terms) > 0)
                @foreach($terms as $term)
                    <tr>


                        <td>
                            {{ ++$row }}</td>

                        <td>
                              {{ $term->text }}
                        </td>

                    </tr>
                @endforeach


            @endif
    </tbody>
</table>
