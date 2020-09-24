<?php

namespace App\file_data;

use App\file_data\SourceDataInterface;

class XmlSourceData implements SourceDataInterface{

    private $filePath;

    public function setFilePath($filePath)
    {
        $this->filePath=$filePath;
    }

    public function getDataArray()
    {

        $xmlFileContent = file_get_contents($this->filePath);
        $fileDataObject = simplexml_load_string($xmlFileContent);
        $fileData=json_decode(json_encode($fileDataObject),true);

        return $this->formatDataToStandardArray($fileData);

    }

    private function formatDataToStandardArray($fileData){

        return  [
            'net_sales_money'=>$fileData['itemization']['element']['net_sales_money']['amount'],
            'taxes'=>[
                'applied_money'=>$fileData['itemization']['element']['taxes']['element'][0]['applied_money']['amount'],
                'rate'=>$fileData['itemization']['element']['taxes']['element'][0]['rate']
            ]
        ];

    }

}