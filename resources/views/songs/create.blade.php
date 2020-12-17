@extends('layouts.app')

@section('content')


    <div class="text-right">

        {{ Auth::user()->name }}

    </div>

        <h2 class="mt-5">プレイリスト登録</h2>

        {!! Form::open(['route'=>'songs.store']) !!}
            <div class="form-group mt-5">

                {!! Form::label('url','Spotifyのプレイリストを登録する',['class'=>'text-success']) !!}
                    <br>例）PlaylistのURLが <span>https://open.spotify.com/playlist/2LS1HBjVWGLjlYwoizbncs?si=dIo5UbFCTVKgutdeKPqaTQ なら</span>
                    <div>  "playlist/"の直後の "<span class="text-success">2LS1HBjVWGLjlYwoizbncs?si=dIo5UbFCTVKgutdeKPqaTQ</span>" を入力</div>
                    <div class="text-danger">＊プレイリスト以外の登録はできません</div>
                {!! Form::text('url',null,['class'=>'form-control']) !!}
                
                {!! Form::label('comment','Playlistのコメント',['class'=> 'mt-3']) !!}
                {!! Form::text('comment',null,['class'=>'form-control']) !!}
                

                {!! Form::submit('登録',['class'=> 'button btn btn-primary mt-5 mb-5']) !!}

            </div>
        {!! Form::close() !!}


        <h2 class="mt-5">Your Playlists</h2>

        @include('songs.songs', ['songs' => $songs])


@endsection