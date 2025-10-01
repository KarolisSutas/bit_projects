<?php

namespace App\Http\Controllers;
use App\Models\Story;
use App\Models\Donation;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $stories = Story::approved()
        ->orderBy('is_completed', 'asc')
        ->orderBy('updated_at', 'desc')
        ->get();
    
        return view('main.index', compact('stories'));
    }

    public function show($id)
    {
        $story = Story::with('donations')->findOrFail($id);
    
        return view('main.show', compact('story'));
    }
    
}
