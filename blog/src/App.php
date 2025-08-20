<?php
namespace Bebro\Blogas;

use Bebro\Blogas\Controllers\AboutController;
use Bebro\Blogas\Controllers\ArticleController;
use Bebro\Blogas\Controllers\RegisterController;

class App 
{

    const URL = 'http://localhost/bit_projects/blog/public/';

    static public function run()
    {
        return self::route();
    }




    static private function route()
    {
        $uri = $_SERVER['REQUEST_URI']; 
        $serverHome = '/bit_projects/blog/public';
    
        $params = str_replace($serverHome, '', $uri);
    
        $params = explode('/', $params);
        array_shift($params);

        $method = $_SERVER['REQUEST_METHOD'];


        return match(true) 
        {
            $method == 'GET' && count($params) === 1 && $params[0] === 'register' => (new RegisterController())->show(),
            $method == 'POST' && count($params) === 1 && $params[0] === 'register' => (new RegisterController())->register(),
            
            count($params) === 1 && $params[0] === '' => (new ArticleController())->index(),            
            count($params) === 1 && $params[0] === 'about' => (new AboutController())->index(),            
            count($params) === 2 && $params[0] === 'article' => (new ArticleController())->show((int)$params[1]),            
            default => self::view('404', ['title' => '404 Not Found']),
        };
    
    }

    static public function view(string $template, array $data = []): string
    {
        extract($data); // sukuria kintamuosius is masyvo data['text] ==> $text
        $url = self::URL;

        ob_start(); // ijungiamas buferis
        include __DIR__ . '/views/top.php';
        include __DIR__ . '/views/' . $template . '.php';
        include __DIR__ . '/views/bottom.php';
        return ob_get_clean(); // paima visą sugeneruotą HTML kaip tekstą
    }
}


// 1. Vartotojas atidaro adresa: http://localhost/bit_projects/blog/public/about

// 2. Paleidžiamas App::run(), jis kviečia route().

// 3. route() aptinka, kad $params[0] === 'about', todėl paleidžia: (new AboutController())->index();

// 4. AboutController::index() Čia sukuriamas kintamasis $aboutText = 'About us';. 
// Jis perduodamas į App::view(...) masyve ['text' => $aboutText]. 
// Funkcija index() grąžins tai, ką grąžins App::view(...).

// 5. App::view()Rezultatas – didelis string su HTML.

// 6. Grįžimo kelias:
// App::view(...) → grąžina HTML → į AboutController::index().
// index() → grąžina HTML → į App::route().
// route() → grąžina HTML → į App::run().
// run() → grąžina HTML → PHP atiduoda jį naršyklei.