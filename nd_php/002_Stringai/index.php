<?php

echo '<h1>Stringai</h1>';

echo '<pre>';

echo '<br>1 UZD<br><br>';
// 1 UZD

$akt_vardas = 'Chuck';
$akt_pavarde = 'Norris';

echo  "$akt_vardas " . $akt_pavarde;

echo '<hr><br>2 UZD<br><br>';
// 2 UZD

$akt_vardas = 'Chuck';
$akt_pavarde = 'Norris';

$didRaid = strtoupper($akt_vardas);
$mazRaid = strtolower($akt_pavarde);

echo  "$didRaid " . $mazRaid;

echo '<hr><br>3 UZD<br><br>';
// 3 UZD

$akt_vardas = 'Chuck';
$akt_pavarde = 'Norris';

$pirm_raides = substr("Chuck",0, 1) . substr("Norris",0, 1);
echo  $pirm_raides;

echo '<hr><br>4 UZD<br><br>';
// 4 UZD

$akt_vardas = 'Chuck';
$akt_pavarde = 'Norris';

$trec_raides = substr("Chuck",2) . substr("Norris",3);
echo  $trec_raides;

echo '<hr><br>5 UZD<br><br>';
// 5 UZD

$filmas = "An American in Paris.";
$mazRaid = strtolower($filmas);

echo str_replace(("a"), "*", "$mazRaid");

echo '<hr><br>6 UZD<br><br>';
// 6 UZD

$filmas = "An American in Paris.";
// $mazRaid = strtolower($filmas);

echo "Raidė 'a' buvo rasta " . substr_count($filmas, 'a') . " kartus";
echo '<br>';
echo "Raidė 'A' buvo rasta " . substr_count($filmas, 'A') . " kartus";

echo '<hr><br>7 UZD<br><br>';
// 7 UZD

$balses = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$ismestosBalses = str_replace($balses, "", "An American in Paris.");
echo $ismestosBalses;
echo '<br>';
$ismestosBalses = str_replace($balses, "", "Breakfast at Tiffany's");
echo $ismestosBalses, PHP_EOL;
$ismestosBalses = str_replace($balses, "", "2001: A Space Odyssey");
echo $ismestosBalses, PHP_EOL;
$ismestosBalses = str_replace($balses, "", "It's a Wonderful Life");
echo $ismestosBalses, PHP_EOL;

echo '<hr><br>8 UZD<br><br>';
// 8 UZD

$tekstas = 'Star Wars: Episode ' . str_repeat(' ', rand(0,5)) . rand(1,20) . ' - A New Hope';

// Parodome pilną eilutę
echo $tekstas, PHP_EOL;

// Ištraukiame epizodo numerį
preg_match('/Episode(\s+)(\d{1,2})/', $tekstas, $radiniuMasyvas); // regex

// Atspausdiname tik epizodo numerį
if (!empty($radiniuMasyvas[2])) { //
    echo "Epizodo numeris: " . $radiniuMasyvas[2]; // pirmoji capture grupe (\d{1,2})
} else {
    echo "Epizodo numerio nerasta";
}
echo '<br>';
if (!empty($radiniuMasyvas[1])) { //
    echo "Tarpu skaicius: " . strlen($radiniuMasyvas[1]); 
} else {
    echo "tarpu nerasta nerasta";
}
echo '<br>';

echo '<hr><br>9 UZD<br><br>';
// 9 UZD


$stringas = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";
echo $stringas, PHP_EOL;

preg_match_all('/\b[A-Za-z]{1,5}\b/', $stringas, $rezultatas);

// print_r($rezultatas);
// var_dump($rezultatas);
echo json_encode($rezultatas);
echo '<br>';

$stringas2 = "Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale";
echo $stringas2, PHP_EOL;

preg_match_all('/\b[\p{L}]{1,5}\b/u', $stringas2, $rezultatas2);

echo json_encode($rezultatas2, JSON_UNESCAPED_UNICODE);

// /\b[A-Za-z]{1,5}\b/g