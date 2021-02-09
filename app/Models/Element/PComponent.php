<?php

namespace App\Models\Element;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PComponent extends Model
{
    use HasFactory, Uuids;
    protected $guarded =[];
}
