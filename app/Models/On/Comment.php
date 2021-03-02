<?php

namespace App\Models\ON;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, Uuids;

    protected $guarded =[];
    protected $hidden  = ['created_at', 'updated_at','commentable_id','commentable_type'];

    public function commentable()
    {
        return $this->morphTo();
    }
}
