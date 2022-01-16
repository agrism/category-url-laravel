<div style="position: fixed;top: 50px; right:10px;background-color:magenta;padding:4px;border-radius:4px;">Blade [{{count($paths)}}]</div>

@include('includes.breadcrumb')


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


<div style="margin-left:20px">

    @foreach ($ads as $ad)
    <div style="padding: 5px;">
        <a href="{{ $ad['href'] ?? '' }}">{{ $ad['body']}}</a>
    </div>
    @endforeach
</div>


<hr>

<?php
    if(defined('LARAVEL_START')){
        echo ROUND(microtime(true) - LARAVEL_START,3);
    } else {
        echo 'not defined!';
    }
