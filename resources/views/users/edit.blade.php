@extends('layout.layout')

@section('content')

<form enctype="multipart/form-data" method="POST" action="{{route('users.update',['user'=>$user->id])}}">
@method('put')
@csrf
    <div class="container py-4">
        <div class="row">
        <div class="col-3">
            @include('layout.sidebar-left')
        </div>
        
        <div class="col-6">
            <div class="card">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
            <div class=" align-items-center">
                <div class="">
                    <img style="width:150px; height: 150px;"   class="me-3 avatar-sm rounded-circle"
                    src="{{asset('/images/avtrs/'.$user->avatar)}}" alt="{{substr($user->name,0,1)}}">
                </div>
                <div>
                    <p>change profile picture</p>
                    <input type="file" name="avatar" id="" class="form-control">
                </div>
                <div>
                    <input type="name" name="name" class="form-control" value="{{$user->name}}">
                    <span class="fs-6 text-muted">{{$user->email}}</span>
                </div>
            </div>
            <div>
                <a href="{{route('users.show',$user)}}">cancel</a>
            </div>
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <textarea name="bio" id=""  class="form-control">
                {{$user->bio}}
            </textarea>
        </div>
        <div>
            <input type="submit" value="update" >
        </div>
     </div>
    </div>
</form>

    <hr>

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