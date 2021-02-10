<?php

namespace App\Models\Element;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PElementTyp extends Model
{
    use HasFactory, Uuids;
    protected $table = 'p_elementtyps';
    protected $guarded =[];
    protected $hidden = ['pivot'];
    
    public function PElement(){
        return $this->hasMany(PElement::class,'p_elementtyp_id');
    }   
    


    //Many to Many
    public function PComponents(){

       return $this->belongsToMany(
            PComponent::class,          // RelatedModel
            'p_typ_components',         // pivot_table_name
            'p_elementyp_id',           // foreign_key_of_current_model_in_pivot_table
            'p_component_id')           // foreign_key_of_other_model_in_pivot_table
            ->withPivot('id');
    }
    
}
