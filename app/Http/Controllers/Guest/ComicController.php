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

    public function create()
    {
        return view('guest.comics.create');
    }

    public function store(Request $request)
    {
        $formData = $request->all();

        $newComic = new Comic();
        $newComic->title = $formData['title'];
        $newComic->description = $formData['description'];
        $newComic->thumb = $formData['thumb'];
        $newComic->price = $formData['price'];
        $newComic->series = $formData['series'];
        $newComic->sale_date = $formData['sale_date'];
        $newComic->type = $formData['type'];
        $newComic->artists = $formData['artists'];
        $newComic->writers = $formData['writers'];
        $newComic->save();

        // $newComic = Comic::create($formData);

        return redirect()->route('guest.comics.show', $newComic->id);
    }
}
