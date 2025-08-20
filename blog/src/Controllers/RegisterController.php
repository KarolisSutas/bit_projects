<?php
namespace Bebro\Blogas\Controllers;
 
use Bebro\Blogas\App;
// use Bebro\Blogas\Models\User;
 
 
 
class RegisterController
{
 
    public function show()
    {
        return App::view('register');
    }
 
}