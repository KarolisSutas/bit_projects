<?php

namespace App\Http\Controllers;
use App\Models\Story;
use App\Models\Donation;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $stories = Story::query()
        ->approved() // <- pritaikom scope'ą ant to paties builder’io
        ->when($request->filled('search'), function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->where('full_name', 'like', '%'.$request->input('search').'%')
                  ->orWhere('story_title', 'like', '%'.$request->input('search').'%');
            });
        })
        // jeigu "0" turi galioti kaip riba, naudok has() vietoj filled()
        ->when($request->has('min_amount') && $request->input('min_amount') !== null, function ($query) use ($request) {
            $query->where('required_amount', '>=', (float)$request->input('min_amount'));
        })
        ->when($request->has('max_amount') && $request->input('max_amount') !== null, function ($query) use ($request) {
            $query->where('required_amount', '<=', (float)$request->input('max_amount'));
        })
        ->when($request->filled('category') && $request->input('category') !== 'All', function ($query) use ($request) {
            $query->where('category', $request->input('category'));
        })
        ->orderBy('is_completed', 'asc')
        ->orderBy('updated_at', 'desc')
        ->paginate(8)->withQueryString();

        
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
