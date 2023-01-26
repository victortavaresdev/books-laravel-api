<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    public function store(StoreBookRequest $request)
    {
        $body = $request->all();
        $authorId = "98501726-f575-4721-a2da-81c5a1ee8e5c";
        $genreId = "9850174e-cfd3-4226-beb0-ec08ce78aa39";
        $book = Book::create([...$body, 'author_id' => $authorId, 'genre_id' => $genreId]);

        return new BookResource($book);
    }

    public function index($id)
    {
        $book = Book::findOrFail($id);

        return new BookResource($book);
    }

    public function getAll()
    {
        $books = Book::all();

        return new BookCollection($books);
    }

    public function update($id, UpdateBookRequest $request)
    {
        $body = $request->all();
        $book = Book::findOrFail($id);
        $book->update($body);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
    }
}
