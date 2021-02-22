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
    
    public function search(Request $request)
    {
        $users = \Auth::user();
        
        $searchComment = $request->input('playlist_comment');
        
        $query = Song::query();
        
        if (isset($searchComment)) {
            $query->where('comment', 'like', '%'.$searchComment.'%');
        }
        
        $songs = $query->orderBy('id', 'asc')->paginate(9);
        
        return view('songs.search', [
            'users' => $users,
            'searchComment' => $searchComment,
            'songs' => $songs,
        ]);
    }
}
