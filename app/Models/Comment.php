<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'names',
        'comment',
        'news_id'
    ];

    public function news()
    {
        return $this->belongsTo(News::class)->withDefault();
    }
}
