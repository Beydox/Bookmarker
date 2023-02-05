<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Bookmark extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'url',
        'description',
        'user_id'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }

    public function tags(): BelongsToMany
    {
        // code...
        return $this->belongsToMany(
            related: Tag::class,
            table: 'bookmark_tag',

        );
    }
}
