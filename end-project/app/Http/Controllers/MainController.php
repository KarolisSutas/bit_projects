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

        
        $data = [
            'total_stories' => Story::count(),
            'stories_completed' => Story::where('is_completed', 1)->count(),
            'total_donations' => Donation::sum('donated_amount')
            ];
    
            return view('main.index', [
                'stories' => $stories,
                'data'    => $data,
            ]);
    }

    public function show($id)
    {
        $story = Story::with('donations')->findOrFail($id);
    
        return view('main.show', compact('story'));
    }
    
}
