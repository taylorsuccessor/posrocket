<?php

namespace App\file_data;

use App\file_data\SourceDataInterface;

class EmptySourceData implements SourceDataInterface{

    public function getDataArray()
    {
        return [];
    }

    public function setFilePath($filePath)
    {

    }
}