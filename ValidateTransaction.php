<?php

namespace App;

use App\file_data\SourceDataGenerator;
use App\validation\ValidateTax;

class ValidateTransaction{

    public function validateTransaction($filePath){

        $objectSourceData = (new SourceDataGenerator($filePath))->generateSourceDataObject();
        $data=($objectSourceData)? $data=$objectSourceData->getDataArray():[];

        return (new ValidateTax())->validate($data);


    }

}
