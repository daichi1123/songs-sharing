<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function storeFav(Request $request, $id)
    {
            \Auth::user()->favorite($id);
            return back();
    }

    public function destroyFav($id)
    {
            \Auth::user()->unfavorite($id);
            return back();
    }
}
