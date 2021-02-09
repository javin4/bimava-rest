<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Traits\SelfReferenceTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PPhase extends Model
{
    use HasFactory, Uuids, SelfReferenceTrait;

    protected $table = "pphases";

    protected $guarded =[];

    /*
    public function children(){
        return $this->hasMany(PPhase::class,'parent_id');
    }

    public function parent(){
        return $this->belongsTo(PPhase::class,'parent_id');
    }*/
/*
    public function parent()
    {
        return $this->belongsTo(PPhase::class);
    }

    public function children()
    {
        return $this->hasMany(PPhase::class, 'parent_id');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function root()
    {
        return $this->parent
            ? $this->parent->root()
            : $this;
    }
       
*/
    public function nextPhase(){
        return $this->hasOne(PPhase::class, 'nextphase_id');
    }
    public function lastPhase(){
        return $this->belongsTo(PPhase::class, 'lastphase_id');
    }

    public function projects(){
        return $this->hasMany(Project::class,'pphase_id');
    }
}
