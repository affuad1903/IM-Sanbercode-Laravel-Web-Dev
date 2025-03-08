<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class books extends Model
{
    protected $table = 'books';
    protected $fillable = ['title','summary','image','stok','genre_id'];
    public function genres(): BelongsTo
    {
        return $this->belongsTo(genres::class,'genre_id');
    }
    public function comments(): HasMany
    {
        return $this->hasMany(comments::class,'book_id');
    }
}
