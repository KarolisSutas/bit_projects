<?php
namespace mano\vardas\toks; // tada nebereikia use, nes namespace pereina per faila ir visiems uzdeda toki vardas

// prefix - pasako kas pavadinime yra nerealaus
// prefix - pasako kas pavadinime yra nerealaus

// use mano\vardas\toks\Matematika; // shortcut, prie visu Matematika nebereik rasyti pilno vardo kelio
use Driftas\Atvaizdavimas;
use mano\vardas\toks\Atvaizdavimas as KitasAtvaizdavimas;



require __DIR__ . '/Planas.php';
require __DIR__ . '/Planas2.php';
require __DIR__ . '/Atvaizdavimas.php';
require __DIR__ . '/Matematika.php';
require __DIR__ . '/su/Atvaizdavimas.php';

$atv = new Matematika();

$atv->atvaizduotiSuma(8, 3);


echo Matematika::P2, Matematika::ATV;


$sk = new Atvaizdavimas(); 

$sk->paint();

// SuKonstanta::NAMES;
// SuKonstanta::PRICES;

define('MANO_KONST', 'Valio!');


echo '<br>';

echo MANO_KONST;

var_dump(
    defined('MANO_KONST')
);

echo KitasAtvaizdavimas::ATV;

// const PI = 3.14159;

// var_dump(
//     defined('PI')
// );

