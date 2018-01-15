<?php

namespace truonghoc;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'alias', 'order', 'parent_id', 'keywords', 'description',
    ];

    public function news()
    {
        return $this->hasMany('truonghoc\News', 'category_id', 'id');
    }
}
