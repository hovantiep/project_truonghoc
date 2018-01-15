<?php

namespace truonghoc;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'News';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title', 'alias', 'order', 'intro', 'keywords', 'content', 'image', 'highlights', 'views',
    ];

    public function category()
    {
        return $this->belongsTo('truonghoc\Category', 'category_id');
    }
}
