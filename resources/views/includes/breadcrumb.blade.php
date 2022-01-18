<ul>
    @foreach($breadCrumb ?? [] as $item)
        <a href="{{$item['href']}}">{{$item['text']}}</a> /
    @endforeach

    @if(!empty($addNewAdPath))
    <a style="float:right; margin: 5px;" href="{{ $addNewAdPath }}">Add new Ad</a>
    @endif

    @isset($backPath)
    <a style="float: right; margin: 5px;" href="{{ $backPath }}">Back to list</a>
    @endisset
</ul>
<hr>
