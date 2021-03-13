<?php

namespace App\Traits;

trait ResourceHelpers
{
    /**
     * Remove null values from Eloquent api resource
     * @param array $data
     * @return array
     */
    public function removeNullValues(array $data)
    {
        $filtered_data = [];
        foreach ($data as $key => $value) {
            $filtered_data[$key] = $this->when($value !== null, $value);
        }

        return $filtered_data;
    }
}