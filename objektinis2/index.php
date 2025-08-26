<?php

require __DIR__ . '/Page.php';
require __DIR__ . '/Article.php';
require __DIR__ . '/Cart.php';

$article1 = new Article('5 dalykai');
$article2 = new Article('Didelis maisas su katem');
$article3 = new Article();

echo '<pre>';

// var_dump($article1, $article2, $article3);

// echo $article2->url;
// protected jau nebesimato cia url. Protected naudojamas kai norima kad nesimatytu isoreje bet galima butu pakeisti overaidint is kitu klasiu, seimos nariu.

// // rasom klases varda, 4 vinys ir tada kintamojo vardas
// echo Article::$score; 
// echo '<br>';
// // isoreje galima pasikreipti jeigu statinis metodas
// // echo Page::$score;  

$place1 = Cart::getCart(); // padarius construct private vietoj new galima taip

$place1->add('Pienas');

$place2 = Cart::getCart(); 

$place2->add('Sviestas');



var_dump($place1,$place2);
