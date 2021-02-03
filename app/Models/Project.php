<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, Uuids;

    protected $guarded =[];

    public function lvs(){
        return $this->hasMany(LV::class,'project_id');
    }

}
