<?php

namespace App\Models\ON;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Onlg extends Model
{
    use HasFactory, Uuids;
    protected $table = 'on_lgs';
    protected $guarded = [];
    protected $hidden  = ['created_at', 'updated_at']; 

    //'lg-Nummer' => 'regex:[A-Z0-9]*',
    public function comments()
    {
        return $this->morphOne(Comment::class, 'commentable');
    }
    
    public function onlb(){
        return $this->belongsTo(Onlb::class,'onlb_id');
    }

    public function onulg(){
        //return $this->hasMany(On_Lg::class);
        return $this->hasMany(Onulg::class,'onlg_id','id');
    }
}
