<?php

namespace App\Models\Element;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PElementTyp extends Model
{
    use HasFactory, Uuids;

    protected $guarded =[];
    
    public function PElement(){
        return $this->hasMany(PElement::class,'p_element_typ_id');
    }   

    
}
