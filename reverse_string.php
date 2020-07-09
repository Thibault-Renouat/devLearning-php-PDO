<?php

$myString= 'Hello World';
$myStringReverse='';

for($i = strlen($myString)-1; $i>=0; $i--){

    $myStringReverse=$myStringReverse.$myString[$i];


}

var_dump($myStringReverse);

