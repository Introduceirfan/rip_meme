<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meme extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'born_at',
        'died_at',
        'cause_of_death',
        'skor_viral',
        'image_url'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
