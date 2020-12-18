<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; 
use App\Song; 

class SongsController extends Controller
{
    public function create()
    {
        $user = \Auth::user();
        $songs = $user->songs()->orderBy('id', 'desc')->paginate(9);
        
        $data=[
            'user' => $user,
            'songs' => $songs,
        ];
        
        return view('songs.create', $data);
    }
    
    public function store(Request $request)
    {

        $this->validate($request,[
            'url' => 'required',
            'comment' => 'max:36',
        ]);

        $request->user()->songs()->create([
            'url' => $request->url,
            'comment' => $request->comment,
        ]);

        return back();
    }
    
    public function destroy($id)
    {
        $song = Song::find($id);

        if (\Auth::id() == $song->user_id) {
            $song->delete();
        }

        return back();
    }
}
