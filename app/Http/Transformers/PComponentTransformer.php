<?php

namespace App\Http\Transformers;

use App\Models\Element\PComponent;

class PComponentTransformer{

    public static function toInstance(array $input, $PComponent = null){
        if (empty($PComponent)) {
            $PComponent = new PComponent();
        }

        foreach ($input as $key => $value) {
            switch ($key) {
                case 'name':
                    $PComponent->name = $value;
                    break;
                case 'id':
                    $PComponent->id = $value;
                    break;
                case 'kennung':
                    $PComponent->kennung = $value;
                    break;   
                case 'ehp_result':
                    $PComponent->ehp_result = $value;
                    break;  
                case 'ehp_override':
                    $PComponent->ehp_override = $value;
                    break;
                case 'ehp_override_flag':
                    $PComponent->ehp_override_flag = $value;
                    break;
                case 'ehp_computed':
                    $PComponent->ehp_computed = $value;
                    break;
            }
        }
        return $PComponent;
    }
}