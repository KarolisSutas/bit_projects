<?php
namespace Bebro\Blogas;

use Bebro\Blogas\Controllers\AboutController;
use Bebro\Blogas\Controllers\ArticleController;
use Bebro\Blogas\Controllers\RegisterController;
use Bebro\Blogas\Controllers\BoxController;
use Bebro\Blogas\Controllers\TreeController;
use Bebro\Blogas\Controllers\LoginController;
use Bebro\Blogas\Controllers\ColorController;
use Bebro\Blogas\Services\Auth;

class App 
{

    const URL = 'http://localhost/bit_projects/blog/public/';

    static public function run()
    {
        session_start();
        return self::route();
    }




    static private function route()
    {
        $uri = $_SERVER['REQUEST_URI']; 
        $serverHome = '/bit_projects/blog/public'; 
    
        $params = str_replace($serverHome, '', $uri); // ką keičiam, kuo keičiam, kur keičiam
        // /bit_projects/blog/public/about => /about
        // /bit_projects/blog/public/article/5 => /article/5
        // /bit_projects/blog/public/ => /  
    
        $params = explode('/', $params);
        array_shift($params);

        $method = $_SERVER['REQUEST_METHOD'];

        if ($params[0] === 'box' && !Auth::check()) {
            return App::redirect('login', ['message' =>
                [
                    'text' => 'You must be logged in to access this page.',
                    'type' => 'error'
                ]
            ]);
        }

         if ($params[0] === 'tree' && !Auth::check()) {
            return App::redirect('login', ['message' =>
                [
                    'text' => 'You must be logged in to access this page.',
                    'type' => 'error'
                ]
            ]);
        }

        if ($params[0] === 'article' && !Auth::check()) {
            return App::redirect('login', ['message' =>
                [
                    'text' => 'You must be logged in to access this page.',
                    'type' => 'error'
                ]
            ]);
        }


        return match(true) 
        {

            // color API

            $method == 'GET' && count($params) === 1 && $params[0] === 'color' => (new ColorController())->index(),
            $method == 'POST' && count($params) === 1 && $params[0] === 'color' => (new ColorController())->getName(),

            //box CRUD

            $method == 'GET' && count($params) === 1 && $params[0] === 'box' => (new BoxController())->index(),
            $method == 'GET' && count($params) === 2 && $params[0] === 'box' && $params[1] === 'create' => (new BoxController())->create(),
            $method == 'GET' && count($params) === 3 && $params[0] === 'box' && $params[1] === 'edit' => (new BoxController())->edit((int)$params[2]),
            $method == 'POST' && count($params) === 2 && $params[0] === 'box' && $params[1] === 'store' => (new BoxController())->store(),
            $method == 'POST' && count($params) === 3 && $params[0] === 'box' && $params[1] === 'update' => (new BoxController())->update((int)$params[2]),
            $method == 'POST' && count($params) === 3 && $params[0] === 'box' && $params[1] === 'delete' => (new BoxController())->delete((int)$params[2]),
            
            // article CRUD
            $method == 'GET' && count($params) === 1 && $params[0] === 'article' => (new ArticleController())->index(),
            $method == 'GET' && count($params) === 2 && $params[0] === 'article' && $params[1] === 'create' => (new ArticleController())->create(),
            $method == 'GET' && count($params) === 3 && $params[0] === 'article' && $params[1] === 'edit' => (new ArticleController())->edit((int)$params[2]),
            $method == 'POST' && count($params) === 2 && $params[0] === 'article' && $params[1] === 'store' => (new ArticleController())->store(),
            $method == 'POST' && count($params) === 3 && $params[0] === 'article' && $params[1] === 'update' => (new ArticleController())->update((int)$params[2]),
            $method == 'POST' && count($params) === 3 && $params[0] === 'article' && $params[1] === 'delete' => (new ArticleController())->delete((int)$params[2]),

            //tree CRUD
            $method == 'GET' && count($params) === 1 && $params[0] === 'tree' => (new TreeController())->index(),
            $method == 'GET' && count($params) === 2 && $params[0] === 'tree' && $params[1] === 'create' => (new TreeController())->create(),
            $method == 'GET' && count($params) === 3 && $params[0] === 'tree' && $params[1] === 'edit' => (new TreeController())->edit((int)$params[2]),
            $method == 'POST' && count($params) === 2 && $params[0] === 'tree' && $params[1] === 'store' => (new TreeController())->store(),
            $method == 'POST' && count($params) === 3 && $params[0] === 'tree' && $params[1] === 'update' => (new TreeController())->update((int)$params[2]),
            $method == 'POST' && count($params) === 3 && $params[0] === 'tree' && $params[1] === 'delete' => (new TreeController())->delete((int)$params[2]),

            // register CRUD
            $method == 'GET' && count($params) === 1 && $params[0] === 'register' => (new RegisterController())->show(),
            $method == 'POST' && count($params) === 1 && $params[0] === 'register' => (new RegisterController())->register(),
            
            // login CRUD
            $method == 'GET' && count($params) === 1 && $params[0] === 'login' => (new LoginController())->show(),
            $method == 'POST' && count($params) === 1 && $params[0] === 'login' => (new LoginController())->login(),
            $method == 'POST' && count($params) === 1 && $params[0] === 'logout' => (new LoginController())->logout(),
           
            // articles CRUD
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
        $flash = $_SESSION['flash'] ?? []; // nuskaitom žinutę iš sesijos
        unset($_SESSION['flash']);

        ob_start(); // ijungiamas buferis
        include __DIR__ . '/views/top.php';
        include __DIR__ . '/views/' . $template . '.php';
        include __DIR__ . '/views/bottom.php';
        return ob_get_clean(); // paima visą sugeneruotą HTML kaip tekstą
    }

    public static function redirect(string $url, array $data = []) : string
    {
        $_SESSION['flash'] = $data; // įrašome žinutę į sesijos kintamąjį

        header('Location: ' . self::URL . $url);
        return '';
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