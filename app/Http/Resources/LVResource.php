<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LVResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
    public function withResponse($request, $response)
    {
        $response->setStatusCode(428, 'Precondition Required');
    }
}
