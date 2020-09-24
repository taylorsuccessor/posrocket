<?php

define('INDEX_DIR',dirname(__FILE__));
require 'system/bootstrap.php';

use App\ValidateTransaction;



$validator =new ValidateTransaction();

$jsonValidationResult=$validator->validateTransaction('/var/www/posrocket/test_files/transaction.json');
echo "Json File taxes is :{$jsonValidationResult}\n";

$xmlValidationResult=$validator->validateTransaction('/var/www/posrocket/test_files/transaction.xml');
echo "XML File taxes is :{$xmlValidationResult}\n";
