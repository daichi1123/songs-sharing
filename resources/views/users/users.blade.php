<h2 class="mt-5 mb-5">User List</h2>

<div class="song row mt-5 text-center">

    @foreach ($users as $key => $user)
        @php
            $song=$user->songs->last();
        @endphp
        
        @php
            $songs=$user->songs;

            $total=0;

            foreach ($songs as $key => $song){
                $total += $song->favorite_users()->count();
            }
        @endphp
    
        @if($loop->iteration % 3 == 1 && $loop->iteration != 1)
            </div>
            <div class="row text-center mt-3">
        @endif
    
            <div class="col-lg-4 mb-5">

                <div class="song text-left d-inline-block">

                    ＠{!! link_to_route('users.show',$user->name,['id'=>$user->id]) !!}

                    <div>
                        @if($song)
                            <div class="text-right">
                               <span class="badge badge-pill badge-success">{{ $total }} いいね!</span>
                            </div>
                            <iframe src="{{ 'https://open.spotify.com/embed/playlist/'.$song->url }}?controls=1&loop=1&playlist={{ $song->url }}" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        @else
                            <div class="text-right">
                               <span class="badge badge-pill badge-danger">未登録</span>
                            </div>
                            <iframe src="https://open.spotify.com/playlist/" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        @endif
                    </div>
                    
                    <p>
                        @if(isset($song->comment))
                               コメント：{{ $song->comment }}
                        @else
                            <span>※コメント登録されてません</span>
                        @endif
                    </p>
                    @include('follow.follow_button',['user'=>$user])
                    @include('favorites.favorite_button',['song'=>$song])
                </div>
                
            </div>

    @endforeach

</div>

{{ $users->links('pagination::bootstrap-4') }}
