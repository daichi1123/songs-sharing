@if(Auth::check())

    @if (Auth::id() != $user->id)

        @if (Auth::user()->is_following($user->id))
        
            {!! Form::open(['route' => ['unfollow', $user->id], 'method' => 'delete']) !!}
                {!! Form::submit('アンフォロー', ['class' => "button btn btn-danger col-sm-6"]) !!}
            {!! Form::close() !!}
            
        @else
        
            {!! Form::open(['route' => ['follow', $user->id]]) !!}
                {!! Form::submit('フォロー', ['class' => "button btn btn-primary col-sm-6"]) !!}
            {!! Form::close() !!}
            
        @endif
    
    @endif

@endif