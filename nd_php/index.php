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




