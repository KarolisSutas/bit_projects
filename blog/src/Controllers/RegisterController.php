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

    public function register()
    {
        // Here you would typically handle the registration logic,
        // such as validating input, saving to a database, etc.
        // For now, we'll just simulate a successful registration.

        // Example: $user = new User($_POST['username'], $_POST['password']);
        // $user->save();

        // return App::view('register', ['message' => 'Registration successful!']);
    }

}