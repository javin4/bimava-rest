<?php

namespace App\Http\Resources;

use App\Traits\ResourceHelpers;
use Illuminate\Http\Resources\Json\JsonResource;


class ONPositionResource extends JsonResource
{

    use ResourceHelpers;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request){   
        return $this->removeNullValues([
            'id' => $this->id,
            'postyp' => $this->postyp,  
            'title' => $this->title,
            'text' => $this->text,
            'eh'=> $this->eh,
            'children' => new ONPositionCollection($this->children),
        ]);
    }
}
