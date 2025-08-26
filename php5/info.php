<?php

    $getAnimal = $_GET['animal'] ?? 'tuscia'; // is anksto suformuotas masyvas automatiskai. Visada uzsidet default ??
    $postAnimal = $_POST['animal'] ?? 'tuscia';

    $getPlusAnimalData = $_GET['plusAnimalData'] ?? 'tuscia';

    $method = $_SERVER['REQUEST_METHOD']; // PATIKRINT KOKS METODAS

    // echo '<pre>';
    // print_r($method);
    // die;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO</title>
</head>
<body>
    <h1>INFO <a href="http://localhost/bit_projects/php5/">back</a></h1>

    <h2>Method: <?php echo $method ?></h2>

    <h2>Get Animal: <?php echo $getAnimal ?></h2>

    <h2>Body Animal: <?php echo $postAnimal ?></h2>

    <h2>Body Animal plus data: <?php echo $getPlusAnimalData ?></h2>


</body>
</html>