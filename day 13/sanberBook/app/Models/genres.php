<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class genres extends Model
{
    protected $table = 'genres';
    protected $fillable = ['name','description'];

    public function books(): HasMany
    {
        return $this->hasMany(books::class,'genre_id');
    }
}
