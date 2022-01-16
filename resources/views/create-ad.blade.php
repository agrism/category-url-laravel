<form action="/store-ad" method="post">
    @csrf
    <input type="hidden" name="path" value="{{ $path }}">
    <textarea name="body" rows="10" cols="100"></textarea>
    <button style="display:block; margin-top:5px">save</button>

</form>


