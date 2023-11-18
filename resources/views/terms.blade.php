@extends('layout.layout')

@section('content')

<div class="container py-4">
    <div class="row">
        <div class="col-3">

            {{-- sidebar left --}}
            @include('layout.sidebar-left')
            {{-- //sidebar left --}}

        </div>
        
        <div class="col-6">

<div>
    <h1>Terms</h1>
    <p>
        If you do not have a consistent goal in life
        , you can not live it in 
        a consistent way. - Marcus Aurelius
    </p>
</div>

</div>

{{-- sidebar right --}}
@include('layout.sidebar-right')
{{-- //sidebar right --}}
</div>
</div>
@endsection
