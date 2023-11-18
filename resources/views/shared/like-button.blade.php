<form action="{{ route('cord.like', $cord->id)}}" method="POST">
    @csrf
    @method('POST')
    <button type="submit">
        <span class="fas fa-heart"> {{$cord->likes()->count()}}</span> 
    </button>
</form>