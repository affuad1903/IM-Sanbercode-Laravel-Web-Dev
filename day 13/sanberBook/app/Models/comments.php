<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class comments extends Model
{
    protected $table = 'comments';
    protected $fillable =[
        'content',
        'user_id',
        'book_id',
    ];
    public function books(): BelongsTo
    {
        return $this->belongsTo(books::class,'book_id');
    }
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
