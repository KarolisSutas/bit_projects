<?php

namespace App\Http\Controllers;
use App\Models\Story;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $stories = Story::approved()->latest('updated_at')->get();

        return view('index', compact('stories'));
    }

    public function show($id)
    {
        $story = Story::findOrFail($id);
        return view('show', compact('story'));
    }
}
