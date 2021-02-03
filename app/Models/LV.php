<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LV extends Model
{
    use HasFactory, Uuids;

    protected $table = "lvs";

    protected $guarded =[];

    public function belongsToProject(){
         return $this->belongsTo(Project::class,'project_id');
     }
}
