<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    //
    protected $fillable = [
        'user_id',
        'mal_id',
        'images',
        'title',
    ];

    // app/Models/Favorite.php
    protected $casts = [
        'images' => 'json', // atau 'array'
        'genres' => 'json',
    ];
}
