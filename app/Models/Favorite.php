<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    //

    protected $fillable = [
        'user_id',
        'mal_id',
        'images',
        'title',
        'type',
        'year',
        'genres',
        'status',
        'score',
        'synopsis'
    ];

    // app/Models/Favorite.php
    protected $casts = [
        'images' => 'json', // atau 'array'
        'genres' => 'json',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
