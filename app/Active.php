<?php

namespace truonghoc;

use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    //
    protected $fillable = [
        'category_id', 'user_id', 'title', 'alias', 'intro', 'content', 'image', 'highlights', 'views',
    ];

    public function category()
    {
        return $this->belongsTo('truonghoc\Category', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo('truonghoc\User', 'user_id');
    }
}
