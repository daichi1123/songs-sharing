@if (Auth::id() != $user->id)

    @if (Auth::user()->is_favorite($song->id))

        {!! Form::open(['route' => ['favorites.unfavorite', $song->id], 'method' => 'delete']) !!}
            {!! Form::submit('いいね！を外す', ['class' => "button btn btn-warning"]) !!}
        {!! Form::close() !!}

    @else

        {!! Form::open(['route' => ['favorites.favorite', $song->id]]) !!}
            {!! Form::submit('いいね！を付ける', ['class' => "button btn btn-success"]) !!}
        {!! Form::close() !!}

    @endif

@endif
