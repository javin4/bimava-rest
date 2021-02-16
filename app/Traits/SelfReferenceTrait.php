<?php

namespace App\Traits;

trait SelfReferenceTrait
{
    protected $parentColumn = 'parent_id';

    public function parent()
    {
        return $this->belongsTo(static::class);
    }

    public function kids()
    {
        return $this->hasMany(static::class, $this->parentColumn);
    }

    public function children()
    {
        return $this->kids()
        ->select('id','kennung','name','parent_id')
        ->orderBy('kennung')
        ->with('children');
    }

    public function root()
    {
        return $this->parent
            ? $this->parent->root()
            : $this;
    }
}