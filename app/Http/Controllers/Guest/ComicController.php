<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comic;

class ComicController extends Controller
{
    public function index()
    {
        $comics = Comic::all();
        return view('guest.comics.index', compact('comics'));
    }

    public function show(Comic $comic)
    {
        // $comic = Comic::findOrFail($id);
        return view('guest.comics.show', compact('comic'));
    }
}
