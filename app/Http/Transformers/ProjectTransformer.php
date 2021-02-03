<?php

namespace App\Http\Transformers;

use App\Models\Project;

class ProjectTransformer{

    public static function toInstance(array $input, $project = null){
        if (empty($project)) {
            $project = new Project();
        }

        foreach ($input as $key => $value) {
            switch ($key) {
                case 'name':
                    $project->name = $value;
                    break;
                case 'kennung':
                    $project->kennung = $value;
                    break;
                case 'id':
                    $project->id = $value;
                    break;   
            }
        }
        return $project;
    }
}