@extends('layout.layout')

@section('content')

@vite('resources/css/app.css')

<div class="container py-4">
        <div class="row">
            <div class="col-3">

                {{-- sidebar left --}}
                @include('layout.sidebar-left')
                {{-- //sidebar left --}}

            </div>
            
            <div class="col-6">
                
                    @include('shared.success-message')
                   
               @include('shared.submit-cord')

                <hr>

                {{-- card --}}
                   @include('shared.cord-card')
                {{-- //card --}}

            </div>

            {{-- sidebar right --}}
            @include('layout.sidebar-right')
            {{-- //sidebar right --}}
        </div>
    </div>

    @endsection
