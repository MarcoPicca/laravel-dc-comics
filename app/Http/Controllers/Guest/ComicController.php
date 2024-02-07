<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Comic;

class ComicController extends Controller
{
    public function index()
    {
        $comics = Comic::orderBy('id', 'DESC')->get();
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


    public function edit(Comic $comic)
    {
        return view('guest.comics.edit', compact('comic'));
    }

    public function update(Request $request, Comic $comic)
    {

        $request->validate([
            'title' => ['required', 'min:4', 'max:40', Rule::unique('comics')->ignore($comic->id)],
            'description' => ['required', 'min:10', 'max:2000'],
            'thumb' => ['required', 'min:4', 'url:http,https'],
            'price' => ['required', 'min:1', 'max:15'],
            'series' => ['required', 'min:10', 'max:40'],
            'sale_date' => ['required', 'min:4', 'max:25'],
            'type' => ['required', 'min:4', 'max:25'],
            'artists' => ['required', 'min:4', 'max:1000'],
            'writers' => ['required', 'min:4', 'max:1000'],
        ], [
            'title.required' => 'No No Nooo, inserisci un titolo',
            'description.required' => 'No No Nooo, inserisci una descrizione',
            'thumb.required' => 'No No Nooo, inserisci un\' immagine',
            'price.required' => 'No No Nooo, inserisci un prezzo',
            'series.required' => 'No No Nooo, inserisci una serie',
            'sale_date.required' => 'No No Nooo, inserisci una data',
            'type.required' => 'No No Nooo, inserisci un genere',
            'artists.required' => 'No No Nooo, inserisci uno o più artisti',
            'writers.required' => 'No No Nooo, inserisci uno o più scrittori',
        ]);
        $data = $request->all();

        //? $comic = Comic::findOrFail($id); in automatico se D.I.
        
        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
        $comic->artists =  json_encode($data['artists']);
        $comic->writers =  json_encode($data['writers']);
        $comic->save();

        // $comic->update($data);

        return redirect()->route('guest.comics.show', $comic->id);
    }
}
