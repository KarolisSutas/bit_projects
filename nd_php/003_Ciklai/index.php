<?php

echo '<h1>Ciklai</h1>';

// 1 UZD
// A
$linija = str_repeat('*', 400);
// B

$simbolis = "";
for ($i = 0; $i < 8; $i++) {
    $simbolis .= str_repeat('*', 50). "<br>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sumatorius</title>
</head>
<body>
    
    <h2>1 UZD</h2>
    <span class="html">A</span>
    <div><?= $linija ?></div>
    <span class="html">B</span>
    <div><?= $simbolis ?></div>
    <hr>

</body>
</html>

<?php

echo '<br>2 UZD<br><br>';
// 2 UZD

$suma = 0;

for ($i = 0; $i <= 300; $i++) {
   $skaiciai = rand(0, 300);
   
   if ( $skaiciai >= 275) {
       echo "<span style=\"color: red;\"> $skaiciai </span> ";
      } else {
        echo  "<span>  $skaiciai </span>";
      }

    if ($skaiciai > 150) {
        $suma++;
    }
}

echo '<br><br>';
echo "Skaiciu daugiau nei 150: $suma";

echo '<hr><br>3 UZD<br><br>';
// 3 UZD

$aibe = rand(3000, 4000);

for ($i = 1; $i <= $aibe; $i++) {
    
    if ( $i % 77 == 0) {
        echo $i ;
        if ( $i + 77 <= $aibe) {
            echo ',' . ' ';
        } 
    } 
}

echo '<hr><br>4 UZD<br><br>';
// 4 UZD

$simbolis = "";
for ($i = 0; $i < 100; $i++) {
    $simbolis .= str_repeat('*', 100). "<br>";
}

echo "<div class=\"kvadratas\"> $simbolis </div>";


echo '<hr><br>6 UZD<br><br>';
// 6 UZD

do {

    $HS = rand(0, 1);
    echo $HS == 0 ? 'H' . '<br>': 'S' . '<br>';

} while (!$HS == 0);
echo '<br>';
echo '<br>';
echo '<br>';

// $kiekis = 0;
// do {

//     $HS = rand(0, 1); 
//     echo $HS == 0 ? 'H' . '<br>' : 'S' . '<br>';

//     if ($HS == 'H') {
//         $kiekis++;
//     }

// } while ($kiekis !== 3);


?>

