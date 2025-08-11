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

echo '<hr><br>4 UZD<br><br>';
// 4 UZD

$filmas = "An American in Paris.";
$mazRaid = strtolower($filmas);

echo str_replace(("a"), "*", "$mazRaid");

echo '<hr><br>5 UZD<br><br>';
// 5 UZD

$filmas = "An American in Paris.";
$mazRaid = strtolower($filmas);

$strArray = count_chars($mazRaid,1);

foreach ($strArray as $key=>$value)
   {
   echo "Raide <b>'".chr($key)."'</b> buvo rasta $value kartus(a)<br>";
   }
