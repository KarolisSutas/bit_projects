<?php

echo '<h1>Kintamieji ir sąlygos</h1>';

echo '<pre>';

echo '<br>1 UZD<br><br>';
// 1 UZD
$vardas = 'Dyglius';
$pavarde = 'Eglinis';
$gim_metai = 1410;
$dabartis = date("Y");
$amzius = $dabartis - $gim_metai;

echo "Aš esu $vardas $pavarde. Man yra $amzius metų";

echo '<hr><br>2 UZD<br><br>';
// 2 UZD

$sk1 = rand(0, 7);
$sk2 = rand(0, 7);

echo "Pirmas skaicius: $sk1";
echo '<br>';
echo "Antras skaicius: $sk2";
echo '<br><br>';


if ($sk1 == 0 || $sk2 == 0) {
    echo "Dalyba is 0 negalima. ";
} 
elseif ($sk1 > $sk2) {
    $rez1 = $sk1 / $sk2;
    $formatuotas = round($rez1, 2);
    echo "Pirmas didesnis: $formatuotas" ;
} 
elseif ($sk1 < $sk2) {
    $rez1 = $sk2 / $sk1;
    $formatuotas = round($rez1, 2);
    echo "Antras didesnis: $formatuotas" ;
}
else echo 'Vienodi';


echo '<hr><br>3 UZD<br><br>';
// 3 UZD

$sk1 = rand(0, 25);
$sk2 = rand(0, 25);
$sk3 = rand(0, 25);
    

echo "Pirmas skaicius: $sk1";
echo '<br>';
echo "Antras skaicius: $sk2";
echo '<br>';
echo "Trečias skaicius: $sk3";
echo '<br>';
echo '<br><br>';


if ($sk1 > $sk2 && $sk1 < $sk3) {
    echo "Vidurinis: $sk1";
}
elseif ($sk2 > $sk3 && $sk2 < $sk1) {
    echo "Vidurinis: $sk2";
}
elseif ($sk3 < $sk1 && $sk3 > $sk2) {
    echo "Vidurinis: $sk3";
}
elseif ($sk2 > $sk1 && $sk2 < $sk3) {
    echo "Vidurinis: $sk2";
}
elseif ($sk1 < $sk2 && $sk1 > $sk3) {
    echo "Vidurinis: $sk1";
}
else {
    echo "Vidurinis: $sk3";
}


echo '<hr><br>4 UZD<br><br>';
// 4 UZD

$a = rand(1, 10);
$b = rand(1, 10);
$c = rand(1, 10);

echo "Pirma kraštine: $a";
echo '<br>';
echo "Antra kraštine: $b";
echo '<br>';
echo "Trečia kraštine: $c";
echo '<br>';
echo '<br><br>';


if ($a + $b > $c && $a + $c > $b && $b + $c > $a) {
    echo 'Trikampį sudaryti galima, kiekviena kraštinė yra trumpesnė už dviejų kitų kraštinių sumą';
}
else {
    echo 'Negalima, viena iš kraštinių ilgesnė už kitų dviejų sumą';
}

echo '<hr><br>5 UZD<br><br>';
// 5 UZD


$pirmas = rand(0, 2);
$antras = rand(0, 2);
$trecias = rand(0, 2);
$ketvirtas = rand(0, 2);

echo "Pirmas skaicius: $pirmas";
echo '<br>';
echo "Antras skaicius: $antras";
echo '<br>';
echo "Trečias skaicius: $trecias";
echo '<br>';
echo "ketvirtas skaicius: $ketvirtas";
echo '<br><br>';

$nulis = 0;
$vienas = 0;
$du = 0;

if ($pirmas == 0) $nulis++;
if ($pirmas == 1) $vienas++;
if ($pirmas == 2) $du++;

if ($antras == 0) $nulis++;
if ($antras == 1) $vienas++;
if ($antras == 2) $du++;

if ($trecias == 0) $nulis++;
if ($trecias == 1) $vienas++;
if ($trecias == 2) $du++;

if ($ketvirtas == 0) $nulis++;
if ($ketvirtas == 1) $vienas++;
if ($ketvirtas == 2) $du++;

echo "nulis = $nulis, vienas = $vienas, du = $du";

echo '<hr><br>6 UZD<br><br>';
// 6 UZD


$skaicius = rand(1, 6);

echo "<h3>gautas skaicius: $skaicius</h3>";

echo '<hr><br>7 UZD<br><br>';
// 7 UZD


