@if(Auth::check())

    @if (Auth::id() != $user->id)

        @if ($song)
        
            @if (Auth::user()->is_favorite($song->id))
                {!! Form::open(['route' => ['favorites.unfavorite', $song->id], 'method' => 'delete']) !!}
                    {!! Form::submit('いいね！外す', ['class' => "button btn btn-warning col-sm-6"]) !!}
                {!! Form::close() !!}
            @else
                {!! Form::open(['route' => ['favorites.favorite', $song->id], 'method' => 'post']) !!}
                    {!! Form::submit('いいね！', ['class' => "button btn btn-success col-sm-6"]) !!}
                {!! Form::close() !!}
            @endif
            
        @endif
            
    @endif
    
@endif
