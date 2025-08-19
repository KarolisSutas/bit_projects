<?php

namespace Bebro\Blogas\Controllers;

use Bebro\Blogas\App;
 
class AboutController
{
    public function index()
    {
        $aboutText = 'About us';

        return App::view('about', ['text' => $aboutText]);
    }
}