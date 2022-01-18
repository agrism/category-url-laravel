@include('includes.breadcrumb')

Add new ad:
<hr>

@foreach($pathData as $pData)

    {{-- @dump($pData) --}}
    <div style="margin: 5px 0">

    <span style="display: inline-block;width:100px;"> {{ $pData->category_parent->name }}</span>
    <select style="width: 200px">
        @foreach($pData->category_children as $child)
            <option
            @if($child->id === $pData->category_children_id) selected @endif
            value={{ $child->id }}

            >{{ $child->name }}</option>
        @endforeach
    </select>
    </div>


@endforeach

<form action="/store-ad" method="post">
    @csrf
    <input type="hidden" name="path" value="{{ $path }}">
    <textarea name="body" style="width: 100%" rows="10"></textarea>
    <button style="display:block; margin-top:5px">save</button>

</form>

<script>
    document.querySelectorAll('select').forEach(element => {

        element.addEventListener('change', function(event){
            console.log(event.target.value);
        })
    });


</script>


