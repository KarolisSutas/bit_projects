<?php

session_start();

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
   $x = $_POST['x']; 
   $y = $_POST['y']; 
   $sum = intval($x) + intval($y);
   $_SESSION['sum'] = $sum;
   $_SESSION['x'] = $x;
   $_SESSION['y'] = $y;

   // redirect to self
   header('Location: http://localhost/bit_projects/mechanika/');
   exit;
}

if ($method == 'GET') {

    if (isset($_SESSION['sum'])) {
        $sum = $_SESSION['sum'];
        $x = $_SESSION['x'];
        $y = $_SESSION['y'];
        unset($_SESSION['sum'], $_SESSION['x'], $_SESSION['y']);
    } else {
        $sum = $x = $y = '';
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatorius</title>
</head>
<body style="margin: 100px;">
    
    <form action="" method="post">
        <input type="number" name="x" value="<?= $x ?>">
        + 
        <input type="number" name="y" value="<?= $y ?>">
        = <span><?= $sum ?></span>
        <hr>
        <button type="submit">+</button>
        <span><a href="http://localhost/bit_projects/mechanika/" style="border: 1px solid black; background: WhiteSmoke; border-radius: 2px; display: flex; align-items: center; width: 22.5px; justify-content: center; text-decoration: none; color: black">X</a></span>
    </form>

</body>
</html>