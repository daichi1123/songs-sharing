<h2 class="mt-5 mb-5">users</h2>

<div class="song row mt-5 text-center">

    @foreach ($users as $key => $user)

        @php
    
            $song=$user->songs->last();
        
        @endphp
    
        @if($loop->iteration % 3 == 1 && $loop->iteration != 1)
    
            </div>
           
            <div class="row text-center mt-3">
        
        @endif
    
            <div class="col-lg-4 mb-5">

                <div class="song text-left d-inline-block">

                    ＠{{ $user->name }}

                    <div>
                        @if($song)
                            <iframe src="{{ 'https://open.spotify.com/embed/playlist/'.$song->url }}?controls=1&loop=1&playlist={{ $song->url }}" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        @else
                            <iframe src="https://open.spotify.com/playlist/" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        @endif
                    </div>
                    
                    <p>
                        @if(isset($song->comment))
                               {{ $song->comment }}
                        @endif
                    </p>

                </div>
                
            </div>

    @endforeach

</div>

{{ $users->links('pagination::bootstrap-4') }}

