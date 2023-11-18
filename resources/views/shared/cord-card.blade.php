<div class="mt-3">
    <div class="card">
        <div class="">
            
            @auth
                @if (Auth::user()->id == $cord->user_id)
                <form method="post" action="{{route('cord.destroy',$cord)}}">
                    @method('delete')
                    @csrf
                    <input type="submit" value="delete">
                </form>
                <a href="{{route('cord.edit',$cord)}}">Edit</a>
                @endif
            @endauth

        </div>
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:50px; height:50px;" class="me-2 avatar-sm rounded-circle"
                        src="{{$cord->user->getAvatar()}}" alt="{{substr($cord->user->name,0,1)}}">
                    <div>
                        <h5 class="card-title mb-0">
                            <a href="{{route('users.show',$cord->user)}}">
                                {{$cord->user->name}}
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>                  
        <div class="card-body">

            @if ($editingCord ?? false)
                <form method="post"  action="{{route('cord.update',$cord)}}">
                    @method('put')
                    @csrf
                    <textarea name="content" rows="4" id="" cols="30" rows="10">
                        {{$cord->content}}
                    </textarea>
                    @error('content')
                        <span>{{ $message }}</span>
                    @enderror
                    <div class="">
                        <button >Update</button>
                    </div>
                </form>
            @else
            <a href="{{route('cord.show', $cord)}}">
                <p class="fs-6 fw-light text-muted">
                    {{$cord->content}}
                </p>
            </a>

            @endif
            <div class="d-flex justify-content-between">
                <div class=" d-flex">
                    @include('shared.like-button')
                </div>
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $cord->created_at }} </span>
                </div>
            </div>

            {{-- comment submit --}}
            @include('shared.comment-submit')
            {{-- //comment submit --}}

            {{-- comment section --}}
            @foreach ($cord->comments()->orderBy('created_at','desc')->get() as $comment)
                @include('shared.comment-box')
            @endforeach
            {{-- comment section --}}

        </div>
    </div>
</div>
