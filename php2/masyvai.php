<?php
echo '<pre>';

$mas1 = [1, 'bebras', 2]; // kintamojo tipas yra Array. NE objektas

$mas2 = $mas1; // priskyrimas pagal reiksme

print_r($mas1);

array_push($mas1, 'Barsukas'); // pridedam i masyva, taip profai nedaro

// $mas1[] = $mas2[] = 'Vilkas'; // taip deedam ir jeigu i abu
$mas1[] = 'Vilkas';

array_unshift($mas1, 'Briedis'); // spausdinti priekyje

$mas2[101] = 'Tigras'; // nesukuria 101 elementu, tik 101 elementa

$mas2['bla'] = 'Tigras2';

$mas2[-5] = 'Tigras3';
$mas2[-5.87] = 'Tigras4'; // skaiciai tik integer tipo

$mas2[2/3] = 'Kengura'; // @ uztildo warningus ir deprekacijas

print_r($mas1);
print_r($mas2);
echo count($mas2); // skaiciuoja masyvo elementus

// => priskiriama reiksme 
$mas3 = [5, 8, 7 => 5, 87 => 10, 3 => 'bla', 'a' => 555]; 

// automatiniai indeksai dedasi nuo 0, kai dedam savo toliau generuojasi didziausias sveikas skaicius ++1.
$mas3[]= 102;

$senoviskas = array(1, 2, 3); // senoviskas, padarysiu juoksis is manes

print_r($senoviskas);
print_r($mas3);

// sort($mas3);

function manoSortas($a, $b) {
    return $a <=> $b;
}

uasort($mas3, 'manoSortas'); // indeksus palieka kaip yra, o usort pakeicia kad is eiles butu

print_r($mas3); // sort perindeksuoja

$mas5 = [1, 2, 3]; 

$mas6 = $mas5; // priskyrimas pagal reiksme
$mas7 = &$mas5; // priskyrimas pagal nuoroda ir matysis ir prisides abiejuose

$mas5[] = 888;
$mas7[] = 888;


echo '<br><hr><br>';

print_r($mas5); 
print_r($mas6); 
print_r($mas7); 


// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// // class Test {}
// // $t = new Test();
// // $t->name = "Jonas"; // Dynamic property – deprecated nuo PHP 8.2