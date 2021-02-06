<?php

namespace App\Http\Transformers;

use App\Models\LV;

class LVTransformer{

    public static function toInstance(array $input, $lv = null){
        if (empty($lv)) {
            $lv = new LV();
        }

        foreach ($input as $key => $value) {
            switch ($key) {
                case 'name':
                    $lv->name = $value;
                    break;
                case 'kennung':
                    $lv->kennung = $value;
                    break;
                case 'id':
                    $lv->id = $value;
                    break;   
            }
        }
        return $lv;
    }
}