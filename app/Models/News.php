<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'news_content'
    ];
    
    public function category()
  {
    return $this->belongsTo(Categories::class)->withDefault();
  }
}
