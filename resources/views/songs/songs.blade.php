<div class="movies row mt-5 text-center">
    
    @foreach ($songs as $key => $song)

        @if($loop->iteration % 3 == 1 && $loop->iteration != 1)
    
            </div>
           
            <div class="row text-center mt-3">
        
        @endif
    
            <div class="col-lg-4 mb-5">

                <div class="song text-left d-inline-block">

                    <div>
                        @if($song)
                            <iframe width="290" height="163.125" src="{{ 'https://www.youtube.com/embed/'.$song->url }}?controls=1&loop=1&playlist={{ $song->url }}" frameborder="0"></iframe>
                        @else
                            <iframe width="290" height="163.125" src="https://www.youtube.com/embed/" frameborder="0"></iframe>
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

{{ $songs->links('pagination::bootstrap-4') }}