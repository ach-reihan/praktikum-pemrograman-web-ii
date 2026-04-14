<?php
$length = 8.9;
$width = 14.7;
$height = 5.4;

echo number_format(calculatePyramidVolume($length, $width, $height), 3, ",") . " m3";

function calculatePyramidVolume($length, $width, $height) {
    $volume = ($length * $width * $height) / 3;
    return $volume;
}
?>