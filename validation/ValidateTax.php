<?php

namespace App\validation;

use App\validation\DataValidationInterface;

class ValidateTax implements DataValidationInterface{


    public function validate($data)
    {

        $countedTaxes= round($data['net_sales_money'] * $data['taxes']['rate'] );
        return ( $countedTaxes == $data['taxes']['applied_money']) ? 'valid':'not valid';

    }
}