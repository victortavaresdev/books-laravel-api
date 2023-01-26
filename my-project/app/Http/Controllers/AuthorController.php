<?php

namespace App\Http\Controllers;

use App\Exceptions\ConflictException;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;

class AuthorController extends Controller
{
    public function store(StoreAuthorRequest $request)
    {
        $body = $request->all();
        $userEmail = Author::where(['email' => $body['email']])->first();
        if ($userEmail) throw new ConflictException();

        $author = Author::create($body);

        return new AuthorResource($author);
    }

    public function index($id)
    {
        $author = Author::findOrFail($id);

        return new AuthorResource($author);
    }

    public function update($id, UpdateAuthorRequest $request)
    {
        $body = $request->all();
        $author = Author::findOrFail($id);
        $author->update($body);
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
    }
}
