<?php

require_once 'GerarParcelas.php';



$testParcelas = genereteParcel(12, date('m'), date('Y'));
echo "<pre>";
print_r($testParcelas);
echo "</pre>";