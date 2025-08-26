<?php

echo '<pre>';
// su for ciklu negalima eiti per masyvus
$mas1 = [5, 8, 25 => 77, 'A' => 88, 777];

print_r($mas1);

// su indeksu atspausdina
foreach($mas1 as $indeksas => $reiksme) {
    echo "<h3>$indeksas: $reiksme</h3>";
    if ($reiksme == 77) { // galima nutraukti cikla
        break;
    }
}

// tik reiksmes
foreach($mas1 as $reiksme) {
    echo "<h3>$reiksme</h3>";
}

echo '<hr><br>';

foreach($mas1 as $indeksas => $reiksme) {
    $mas1[$indeksas] = $reiksme + 1; // padidint vienetu
}

print_r($mas1);

foreach($mas1 as &$reiksme) {
     $reiksme++;
}

print_r($mas1);

$spalvos = ['Raudona', 'Geltona', 'Balta'];
print_r($spalvos);

foreach($spalvos as &$spalva) {} // jeigu foreach panaudojom priskyrima pagal rodykle tada reikia panaikint ta rodykle

unset($spalva);
// spalva === $spalvos[2] 

foreach($spalvos as $spalva) {
    echo "<h4>$spalva</h4>";
}

print_r($spalvos);

// masyvas masyve

$mas8 = []; // kol neutrim masyvo negalim naudoti foreach

for($i = 0; $i < 10; $i++) {
    $mas8[] = rand(10, 99);
}

print_r($mas8);


$mas10X10 = [];

for($i = 0; $i < 10; $i++) {
    $mas10X10[$i] = [];
    for($j = 0; $j < 10; $j++) {
        $mas10X10[$i][] = rand(10, 99);
    }
}

print_r($mas10X10);










