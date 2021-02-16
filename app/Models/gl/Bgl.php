<?php

namespace App\Models\gl;

use App\Traits\Uuids;
use Illuminate\Support\Str;
use App\Traits\SelfReferenceTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bgl extends Model
{
    use HasFactory, Uuids, SelfReferenceTrait;

    protected $guarded =[];

    public function getTextAttribute(){
        return "{$this->kennung} {$this->name}";
    }

    public function getStateAttribute(){
        $state = "closed";
        if (Str::length($this->kennung)<1) {
            $state = "open";
        }
        if (count($this->children)==0){
            $state = null;
        }
        return $state;
    }

    //protected $appends = ['text'];
    protected $appends = array('text','state');

    protected $hidden = array('name');
}
