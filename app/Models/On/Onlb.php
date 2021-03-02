<?php

namespace App\Models\ON;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Onlb extends Model
{
    use HasFactory, Uuids;

    protected $guarded =[];
    protected $hidden  = ['created_at', 'updated_at'];

    public function onlg(){
        return $this->hasMany(Onlg::class,'onlb_id');
    }
}
