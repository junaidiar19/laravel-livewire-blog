<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug', 'title', 'content', 'is_published', 'cover', 'category_id', 'user_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $params): void
    {
        // searching by title
        $query->when(@$params['search'], function($query) use ($params) {
            $query->where('title', 'like', '%'.$params['search'].'%');
        });
    }

    public function getCoverUrlAttribute()
    {
        return 'https://via.placeholder.com/800x500.png?text=' . $this->title;
    }
}
