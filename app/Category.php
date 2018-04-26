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

    public function news()
    {
        return $this->hasMany('truonghoc\News', 'category_id', 'id');
    }

    public function active()
    {
        return $this->hasMany('truonghoc\Active', 'category_id', 'id');
    }

    public function document()
    {
        return $this->hasMany('truonghoc\Document', 'category_id', 'id');
    }

    public function alert()
    {
        return $this->hasMany('truonghoc\Alert', 'category_id', 'id');
    }
}
