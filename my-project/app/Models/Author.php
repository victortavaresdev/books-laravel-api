<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasUuids;

    protected $fillable = [
        'first_name',
        'last_name',
        'email'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
