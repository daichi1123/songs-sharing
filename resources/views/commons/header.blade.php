<header class="mb-5">

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">

        <a class="navbar-brand text-white" href="/">Square Music</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                
                @if (Auth::check())
                
                    <li class="nav-item">{!! link_to_route('logout', 'ログアウト', [], ['class' => 'nav-link text-white']) !!}</li>
                    <li class="nav-item">{!! link_to_route('users.show','マイページ',['id'=>Auth::id()],['class'=>'nav-link text-white']) !!}</li>
                    <li class="nav-item">{!! link_to_route('songs.create','プレイリスト登録',['id'=>Auth::id()],['class'=>'nav-link text-white']) !!}</li>
                    
                @else
                
                    <li class="nav-item">{!! link_to_route('signup', '新規ユーザ登録', [], ['class' => 'nav-link text-white']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link text-white']) !!}</li>
                
                @endif
                
            </ul>
        </div>

    </nav>

</header>