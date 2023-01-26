<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;

class GenreController extends Controller
{
    public function store(StoreGenreRequest $request)
    {
        $body = $request->all();
        $genre = Genre::create($body);

        return new GenreResource($genre);
    }

    public function index($id)
    {
        $genre = Genre::findOrFail($id);

        return new GenreResource($genre);
    }

    public function update($id, UpdateGenreRequest $request)
    {
        $body = $request->all();
        $genre = Genre::findOrFail($id);
        $genre->update($body);
    }

    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();
    }
}
