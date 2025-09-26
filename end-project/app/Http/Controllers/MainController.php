<?php

namespace App\Http\Controllers;
use App\Models\Story;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $stories = Story::approved()->latest()->get();

        return view('index', compact('stories'));
    }
}
