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
        'name', 'alias', 'order', 'parent_id', 'keywords', 'description', 'route'
    ];

    public function post()
    {
        return $this->hasMany('truonghoc\Post', 'category_id', 'id');
    }
}
