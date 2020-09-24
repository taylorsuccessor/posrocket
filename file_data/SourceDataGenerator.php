<?php

namespace App\file_data;

use App\file_data\EmptySourceData;

class SourceDataGenerator {

    private $sourceFile=NULL;

    function __construct($sourceFile) {

        $this->sourceFile=$sourceFile;

    }

    private function getSourceFileType(){

        $file = new \SplFileInfo($this->sourceFile);
        return ucfirst(strtolower($file->getExtension()));
    }

    public function generateSourceDataObject(){

        $fileExtension=$this->getSourceFileType();

        if(in_array($fileExtension,['Xml','Json'])){
            $sourceDataClassName= 'App\\file_data\\'.$fileExtension.'SourceData';
            $sourceDataClass= new $sourceDataClassName();
            $sourceDataClass->setFilePath($this->sourceFile);
            return $sourceDataClass;
        }

        return new EmptySourceData();
    }

}