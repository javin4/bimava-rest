<?php

namespace App\Models\data;

use App\Traits\Uuids;
use App\Models\data\ParamValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Param extends Model
{
    use HasFactory, Uuids;
    protected $table = 'params';
    protected $guarded = [];
    protected $hidden  = ['created_at', 'updated_at'];

    public function Values(){
        return $this->hasMany(ParamValue::class, 'param_id');
    }

    
}
