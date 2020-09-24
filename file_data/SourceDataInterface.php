<?php

namespace App\file_data;

interface SourceDataInterface{

    public function getDataArray();

    public function setFilePath($filePath);
}
