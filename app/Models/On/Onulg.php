<?php

namespace App\Models\ON;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Onulg extends Model
{
    use HasFactory, Uuids;
    protected $table = 'on_ulgs';
    protected $guarded =[];
    protected $hidden  = ['created_at', 'updated_at']; 

    public function onlg(){
        return $this->belongsTo(Onlg::class,'onlg_id','id');
        //return $this->belongsTo(On_Lg::class);
    }
}
