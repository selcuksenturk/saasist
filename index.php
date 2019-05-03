<?php

$astraPath = getcwd() . "/astra/astra-inc.php";

if(file_exists($astraPath)){
    include_once($astraPath);
}

define('APP_RUN', true);
require ('system/app.php');
