<?php
/**
 *
 * get MetaData's
 *
 */
include_once __DIR__ . "/../../vendor/autoload.php";

use TheImage\Image;


$image = new Image();

$image->setImage(__DIR__ . "/tests-1.png");


$MetaData = $image->getMetaData();


foreach ($MetaData as $key => $value){
    if (is_array($value)){
        foreach ($value as $k => $v){
            echo $k . ": " . $v . PHP_EOL;
        }
    }else{
        echo $key . ": " . $value . PHP_EOL;
    }
}
