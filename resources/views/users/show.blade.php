@extends('layout.layout')

@section('content')

<div class="container py-4">
    <div class="row">
        <div class="col-3">
            @include('layout.sidebar-left')
        </div>

<div class="col-6">
    <div class="card">
        <div class="px-3 pt-4 pb-2">
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="">
                    <img style="width:150px; height: 150px;"  class="me-3 avatar-sm rounded-circle"
                    src="{{$user->getAvatar()}}" alt="{{substr($user->name,0,1)}}">
                </div>
                <div>
                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name}}
                    </a></h3>
                    <span class="fs-6 text-muted">{{$user->email}}</span>
                </div>
            </div>
            @auth
                @if (Auth::user()->id == $user->id)
                <div>
                    <a href="{{route('users.edit',$user)}}">Edit</a>
                </div>
                @endif
            @endauth
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <p class="fs-6 fw-light">
               {{ $user->bio}}
            </p>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 
                {{ $user->followers()->count()}}
                </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{$user->cords()->count()}} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $user->comments()->count()}} </a>
            </div>
            @auth
                @if(Auth::id() !== $user->id)
                    @if (Auth::user()->followings()->where('user_id',$user->id)->exists())
                        <p>Following</p>
                        <form method="POST" action="{{route('users.unfollow',$user)}}">
                            @method('POST')
                            @csrf
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-sm"> Unfollow </button>
                               </div>
                           </form>
                    @else
                        <form method="POST" action="{{route('users.follow',$user)}}">
                         @method('POST')
                         @csrf
                         <div class="mt-3">
                             <button type="submit" class="btn btn-primary btn-sm"> Follow + </button>
                            </div>
                        </form>
                    @endif
                @endif
            @endauth
        </div>
     </div>
    </div>
    <hr>
    <h2>Cords by {{$user->name}}</h2>
    @forelse ($userCords as $cord)
        @include('shared.cord-card')
        @empty
        @if (Auth::id() == $user->id)
        <h1>You have No cords yet</h1>
        @else
        <h1>User has No Cords</h1>
        @endif
        @endforelse
        {{$userCords->links()}}
</div>

@include('layout.sidebar-right')
@endsection