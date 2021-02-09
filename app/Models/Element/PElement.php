<?php

namespace App\Models\Element;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PElement extends Model
{
    use HasFactory, Uuids;

    protected $guarded =[];
    
    public function pElementTyp(){
        return $this->belongsTo(PElementTyp::class,'p_element_typ_id');
    }  
}
