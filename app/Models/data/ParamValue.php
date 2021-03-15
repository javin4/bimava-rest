<?php

namespace App\Models\data;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParamValue extends Model
{
    use HasFactory, Uuids;
    protected $table = 'param_values';
    protected $guarded = [];
    protected $hidden  = ['created_at', 'updated_at','unit','valuetype'];
    protected $casts = [
        'id' => 'string',
    ];
    //protected $hidden  = ['created_at', 'updated_at'];

    public function Value(){
        return $this->belongsTo(Param::class, 'param_id');
    }

    public function on_postions(){
        return $this->belongsToMany(ParamValue::class, 'on_position_paramsvalue','on_position_id','paramsvalue_id');
    }
}
