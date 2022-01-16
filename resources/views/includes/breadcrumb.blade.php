<ul>
    @foreach($breadCrumb ?? [] as $item)
        <a href="{{$item['href']}}">{{$item['text']}}</a> /
    @endforeach

    <a style="float:right; margin: 5px;" href="{{ request()->getPathInfo() }}/add">Add new Ad</a>
    @isset($backPath)
    <a style="float: right; margin: 5px;" href="{{ $backPath }}">Back to list</a>
    @endisset
</ul>
<hr>
