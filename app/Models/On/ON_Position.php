<?php

namespace App\Models\ON;

use App\Models\data\Param;
use App\Models\data\ParamValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ON_Position extends Model{
    use HasFactory;
    protected $table = 'on_positions';
    protected $guarded = [];
    
    protected $primaryKey = 'id'; // or null
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $hidden  = ['created_at', 'updated_at'];



    //self referencing
    public function parent(){
        return $this->belongsTo(ON_Position::class);
    }

    public function child(){
        return $this->hasMany(ON_Position::class, 'parent_id');
    }

    public function children(){
        return $this->child()
        //->select('id','kennung','name','parent_id')
        ->orderBy('id')
        ->with('children');
    }

    //
    public function paramvalue(){
        return $this->belongsToMany(ParamValue::class, 'on_position_paramsvalue','on_position_id','paramsvalue_id');
    }
}
