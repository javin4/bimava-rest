<?php
/*
namespace App\Transformers;

use App\Models\Company;

class CompanyTransformer{

    public static function toInstance(array $input, $company = null){
        if (empty($company)) {
            $company = new Company();
        }

        foreach ($input as $key => $value) {
            switch ($key) {
                case 'name':
                    $company->name = $value;
                    break;
                case 'strasse':
                    $company->strasse = $value;
                    break;
                case 'ort':
                    $company->ort = $value;
                    break;
                case 'plz':
                    $company->plz = $value;
                    break;
                case 'land':
                    $company->land = $value;
                    break;
                case 'telefon':
                    $company->telefon = $value;
                    break;
                case 'email':
                    $company->email = $value;
                    break;
                case 'www':
                    $company->www = $value;
                    break;     
            }
        }
        return $company;
    }
}*/