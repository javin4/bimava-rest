<?php

namespace App\Models\Element;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PComponent extends Model
{
    use HasFactory, Uuids;
    protected $table = 'p_components';
    protected $guarded =[];
    protected $casts = [
        'id' => 'string',
        'ehp_result' => 'decimal:4'
    ];

    protected $hidden = ['pivot'];

    //Many to Many
    public function PElementTyps(){
        return $this->belongsToMany(
            PElementTyp::class,             // RelatedModel
             'p_typ_components',      // pivot_table_name
             'p_component_id',                     // foreign_key_of_current_model_in_pivot_table
             'p_elementyp_id');                  // foreign_key_of_other_model_in_pivot_table
     }
}
