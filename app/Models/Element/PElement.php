<?php

namespace App\Models\Element;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PElement extends Model
{
    use HasFactory, Uuids;
    protected $table = 'p_elements';
    protected $guarded =[];
    
    public function pElementTyp(){
        return $this->belongsTo(PElementTyp::class,'p_elementtyp_id');
    }  
}
