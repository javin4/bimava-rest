<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectPhase extends Model
{
    use HasFactory, Uuids;

    protected $table = "pPhases";

    protected $guarded =[];

    public function xxx(){
        return $this->hasMany(LV::class,'project_id');
    }
}
