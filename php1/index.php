<?php


$str1 = 'Labas';
$str2 = ' ka tu?';

$str3 = $str1 . $str2; // stringu sudejimas

echo $str3;
echo '<br>';

$str4 = '--- $str1 ----';
$str5 = "--- $str1 ----"; // analogas `` JS

echo $str4;
echo '<br>';

echo $str5;
echo '<br>';

unset($str5);
echo $str5;
echo '<br>';

$labas = 'kit';

$pirmas = 'antras';
$antras = 'kitas';
$kitas = 'Bla Bla';
echo $$$pirmas;
echo '<br>';

print $labas;
echo '<br>';

echo $pirmas, $antras;
echo '<br>';

$str6 = 'Pelė';

$mas = [1, 2 ,3];
echo '<pre>';
var_dump($mas);
echo '<br>';

// echo $mas; // warning negalima masyvo echoint
print_r($mas);

// ANTRA DALIS

echo '<br>';

$k = 'a';
var_dump(++$k); // padidina raides is a i b, bet nemazina


$rezultatas = $vienas ?? 8;// gražina 8
echo $rezultatas;
echo '<br>';
echo '<br>';

$skaicius = 24;
$type = 13.98;
echo var_dump(is_float($type));
echo '<br>';

echo '<br>';
echo '<br>';

$var = "13.98"; // pradinė reikšmė yra string (tekstas)
// Parodome tipą ir reikšmę prieš pakeitimą
var_dump($var); 
echo '<br>';
// Pakeičiame tipą į float
settype($var, "float");
// Parodome tipą ir reikšmę po pakeitimo
var_dump($var);
echo '<br>';
// Pakeičiame tipą į integer
settype($var, "integer");
// Pakeičiame tipą į integer
var_dump($var);
echo '<br>';
// Pakeičiame tipą į string
settype($var, "string");
var_dump($var);

echo '<br>';
echo '<br>';

function print_info(array $info) {
    print_r($info);
    }
    $my_info = array('name' => 'Vladi', 'age' => 33, 'gender' => 'M', 'job' =>
    'Clever Techie');
    print_info($my_info);

    echo '<br>';
    echo '<br>';
    
    class Animal
    {
    //set default property value, just for fun
    public $sound = "Cows don't growl. ";
    function make_sound( )
    {
    //$this = $cow object ($cow->sound)
    // echo $this->sound;
    }
    }
    $cow = new Animal;
    echo $cow->sound;
    $cow->sound = 'Moooooooo';
    $cow->make_sound();
    //output: Cows don't 