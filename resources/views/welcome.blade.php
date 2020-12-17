@extends('layouts.app')

@section('content')

    <div class="center jumbotron bg-success">

        <div class="text-center text-white">
            <h1>Music Sharing</h1>
        </div>

    </div>
    
    <div class="text-right">
        
        @if(Auth::check())
            {{ Auth::user()->name }}
        @endif
        
    </div>
    
    @include('users.users', ['users'=>$users])

@endsection