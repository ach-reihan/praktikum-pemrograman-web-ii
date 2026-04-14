<?php
$celcius = 37.841;

echo "Fahrenheit (F) = " . number_format(celciusToFahrenheit($celcius), 4, ",") . "<br />";
echo "Reamur (R) = " . number_format(celciusToReamur($celcius), 4, ",") . "<br />";
echo "Kelvin (K) = " . number_format(celciusToKelvin($celcius), 4, ",") . "<br />";

function celciusToReamur($celcius) {
    $reamur = (4 / 5) * $celcius;
    return $reamur;
}

function celciusToFahrenheit($celcius) {
    $fahrenheit = (9 / 5) * $celcius + 32;
    return $fahrenheit;
}

function celciusToKelvin($celcius) {
    $kelvin = $celcius + 273.15;
    return $kelvin;
}
?>