<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'title',
        'content',
        'article_category_id'
    ];
    protected $appends = [
        'comments_counts'
    ];

    function category(): BelongsTo
    {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }

    function comments(): HasMany
    {
        return $this->hasMany(ArticleComment::class);
    }

    function getCommentsCountAttribute()
    {
        return $this->comments->count();
    }
}
