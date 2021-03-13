<?php

namespace App\Models\ON;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
