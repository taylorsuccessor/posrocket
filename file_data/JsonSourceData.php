<?php

namespace App\file_data;

use App\file_data\SourceDataInterface;

class JsonSourceData implements SourceDataInterface{

    private $filePath;

    public function setFilePath($filePath)
    {
        $this->filePath=$filePath;
    }

    public function getDataArray()
    {
        $fileContent = file_get_contents($this->filePath);
        $dataArray = json_decode($fileContent, true);

        return $this->formatDataToStandardArray($dataArray);


    }


    private function formatDataToStandardArray($fileData){

        return  [
            'net_sales_money'=>$fileData['itemization'][0]['net_sales_money']['amount'],
            'taxes'=>[
                'applied_money'=>$fileData['itemization'][0]['taxes'][0]['applied_money']['amount'],
                'rate'=>$fileData['itemization'][0]['taxes'][0]['rate']
            ]
        ];

    }
}