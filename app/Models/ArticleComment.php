<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id',
        'content'
    ];
    function article(): BelongsTo {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
