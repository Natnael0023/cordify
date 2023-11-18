@auth
<form method="post" action="{{route('cord.store')}}">
    @method('post')
    @csrf
    <h4> Share yours ideas </h4>
    <div class="row">
        <div class="mb-3">
            <textarea class="form-control" name="content" id="idea" rows="3" ></textarea>
            @error('content')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn bg-primary text-white"> Share </button>
        </div>
    </div>
</form>
@endauth

@guest
    <h1>Login to share cords</h1>
@endguest