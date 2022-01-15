Blade [{{count($paths)}}]

<ul>
    @foreach($breadCrumb ?? [] as $item)
        <a href="{{$item['href']}}">{{$item['text']}}</a> /
    @endforeach
</ul>

<hr>


<table border="0">
        @foreach($paths ?? [] as $index => $path)

            @if($index % 30 === 0)
    </td>
    <td style="vertical-align: top; width: 180px;">
        @endif

        <a href="{{$path['href']}}">{{$path['text']}}</a><br>


        @endforeach
    </td></tr>
</table>


<ul>
    @foreach ($ads as $ad)
        <li>{{ json_encode(array_values($ad)[0]->body)}}</li>
    @endforeach
</ul>

<hr>

<?php
    if(defined('LARAVEL_START')){
        echo ROUND(microtime(true) - LARAVEL_START,3);
    } else {
        echo 'not defined!';
    }
