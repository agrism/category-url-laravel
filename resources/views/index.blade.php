Blade

<ul>
    @foreach($breadCrumb ?? [] as $item)
        <a href="{{$item['href']}}">{{$item['text']}}</a> /
    @endforeach
</ul>

<hr>


<table border="0">
{{--    <td style="vertical-align: top; width: 180px;">--}}
        @foreach($paths ?? [] as $index => $path)

            @if($index % 30 === 0)
    </td>
    <td style="vertical-align: top; width: 180px;">
        @endif

        <a href="{{$path['href']}}">{{$path['text']}}</a><br>


        @endforeach
    </td></tr>
</table>