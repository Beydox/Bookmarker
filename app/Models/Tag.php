<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',

    ];

    public $timestamps = false;

    public function bookmarks(): BelongsToMany
    {
        // code...
        return $this->belongsToMany(
            related: Bookmark::class,
            table: 'bookmark_tag',
        );
    }
}
