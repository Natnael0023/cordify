@auth
<form method="POST" action="{{route('cords.comments.store', $cord)}}" >
    @csrf
    <div class="mb-3">
        <textarea name="content" class="fs-6 form-control" rows="1" ></textarea>
    </div>
    <div>
        <button type="submit" class="btn bg-primary text-white"> Post Comment </button>
    </div>
</form>
@endauth