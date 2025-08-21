<?php
namespace Bebro\Blogas\Controllers;

use Bebro\Blogas\App;
use Bebro\Blogas\Models\Article;

class ArticleController
{
    // 1.
    public function index(): string
    {
        $articles = (new Article())->index();
        return App::view('articles/index', ['articles' => $articles, 'title' => 'Articles List']);
    }
    
    // 2.
    public function show(int $id) : string
    {
        
        if (!$id) {
            return App::view('404', ['title' => '404 Not Found']);
        }

        $article = (new Article())->show($id);

        if (!$article) {
            return App::view('404', ['title' => '404 Not Found']);
        }

        return App::view('articles/show', ['article' => $article, 'title' => $article['title']]);
    }
}

// 1. 
// Sukuriamas naujas Article modelis → kviečiamas jo metodas index(), kuris iš DB paima visus straipsnius.
// Duomenys perduodami į view failą articles/index (pvz. views/articles/index.php).
// Į view paduodamas masyvas: visi straipsniai ir puslapio antraštė "Articles List".
// Čia rodoma straipsnių sąrašas (pvz., /article arba /).

// 2. 
// Metodas (public function show(int $id) : string) gauna $id (pvz. /article/1 → $id = 1).
// Jei $id tuščias → grąžina 404.
// Kviečia Article->show($id), kuris iš DB paima straipsnį pagal ID.
// Jei straipsnis nerastas → grąžina 404.
// Jei rastas → perduoda straipsnį į view failą articles/show.
// Čia rodoma vieno straipsnio detalė (pvz., straipsnio pavadinimas ir turinys).