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

$sk1 = rand(-10, 10);
$sk2 = rand(-10, 10);
$sk3 = rand(-10, 10);

if ($sk1 < 0) {
    echo '<span style="color: green;">' . $sk1 . '</span> ';
}
elseif ($sk1 == 0) {
    echo '<span style="color: red;">' . $sk1 . '</span> ';
}
else { 
    echo '<span style="color: blue;">' . $sk1 . '</span> ';
}
if ($sk2 < 0) {
    echo '<span style="color: green;">' . $sk2 . '</span> ';
}
elseif ($sk2 == 0) {
    echo '<span style="color: red;">' . $sk2 . '</span> ';
}
else { 
    echo '<span style="color: blue;">' . $sk2 . '</span> ';
}
if ($sk3 < 0) {
    echo "<span style=\"color: green;\"> $sk3 </span> ";
}
elseif ($sk3 == 0) {
    echo "<span style=\"color: red;\"> $sk3 </span> ";
}
else { 
    echo "<span style=\"color: blue;\"> $sk3  </span> ";
}

echo '<hr><br>8 UZD<br><br>';
// 8 UZD

$kiekis = rand(5, 3000);
echo "Kiekis: $kiekis vnt";
echo "<br>";

echo "Kaina: " . ($kaina = $kiekis * 2) . " Eur";
echo "<br>";


$nuolaida;

if ($kiekis > 2000) {
    $nuolaida = 4;
} else if ($kiekis > 1000) {
     $nuolaida= 3;
} else {
    $nuolaida = 0;
}
echo "Nuolaida: $nuolaida %";
echo "<br>";

function zvakKaina($kaina, $nuolaida) {
    echo "Galutinė kaina " . ($kaina - ($kaina * $nuolaida / 100)) . " Eur";
}

zvakKaina($kaina, $nuolaida);

echo '<hr><br>9 UZD<br><br>';
// 9 UZD

$jurgis = rand(0, 100);
$antanas = rand(0, 100);
$aloyzas = rand(0, 100);

echo "Jurgio skaicius: $jurgis, Antano skaicius: $antanas, Aloyzo skaicius: $aloyzas";
echo "<br>";


$vidurkis = ($jurgis + $antanas + $aloyzas) / 3;
$intVidurkis = intval($vidurkis);

echo "Vidurkis: $intVidurkis";
echo "<br>";
echo "<br>";


$koreguotaSuma = 0;
$koreguotasKiekis = 0;

if ($jurgis >= 10 && $jurgis <= 90) {
    echo "Jurgio skaicius: $jurgis";
    echo "<br>";
    $koreguotaSuma += $jurgis;
    $koreguotasKiekis++;
}
else {
    echo "Jurgio skaicius atmestas";
    echo "<br>";
}
if ($antanas >= 10 && $antanas <= 90) {
    echo "Antano skaicius: $antanas";
    echo "<br>";
    $koreguotaSuma += $antanas;
    $koreguotasKiekis++;
}
else {
    echo "Antano skaicius atmestas";
    echo "<br>";
}
if ($aloyzas >= 10 && $aloyzas <= 90) {
    echo "Aloyzo skaicius: $aloyzas";
    echo "<br>";
    $koreguotaSuma += $aloyzas;
    $koreguotasKiekis++;
}
else {
    echo "Aloyzo skaicius atmestas";
    echo "<br>";
}

if ($koreguotasKiekis > 0) {
$koregVidurkis = $koreguotaSuma / $koreguotasKiekis;
$intKoregVidurkis = intval($koregVidurkis);
}
else {
    echo 'Visi broliai atmesti';
}

echo "Koreguotas vidurkis: $intKoregVidurkis";
echo "<br>";
echo "<br>";

echo '<hr><br>10 UZD<br><br>';
// 10 UZD

$h = rand(1, 24);
$min = rand(1, 60);
$sec = rand(1, 60);
$extraSec = rand(0, 300); // 0 iki 1 valandos

echo "Laikas $h:$min:$sec";

