<?php
/**
 *
 * print text in image
 * 
 */
include_once __DIR__ . "/../../vendor/autoload.php";

use TheImage\Image;


$image = new Image();

$image->setImage(__DIR__ . "/tests-2.png");


/*
 * @param string $text
 * @param array $color
 * @param string $save
 * @param array $Options
 * @return bool|string
 * @throws Exception

    function printText(string $text, array $color, string $save, array $Options = []): bool|string

    color type is rgb
 */
$color = $image->setColorText(0, 0, 0);
$Option = $image->setOptionPrint(20, __DIR__ . "/verdanaz.ttf", 80, 40, 0);


$image->printText("
My Text
",$color, __DIR__ . "/Image", $Option);