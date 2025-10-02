<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Donation;
use App\Http\Requests\StoreStoryRequest;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $stories = Story::query();

        $stories->when(request('search'), function ($query) {
            $query->where(function ($query) {
                $query->where('full_name', 'like', '%' . request('search') . '%')
                ->orWhere('story_title', 'like', '%' . request('search') . '%');
            });
        })->when(request('min_amount'), function ($query) {
            $query->where('required_amount', '>=', request('min_amount'));
        })->when(request('max_amount'), function ($query) {
            $query->where('required_amount', '<=', request('max_amount'));
        })->when(request('category'), function ($query) {
            $query->where('category', request('category'));
        });

        if ($request->status === 'Approved') {
            $stories->where('is_approved', 1);
        } elseif ($request->status === 'Not Approved') {
            $stories->where('is_approved', 0);
        } elseif ($request->status === 'Completed') {
            $stories->where('is_completed', 1);
        };
    
        // Bendras rūšiavimas tarp likusių
        $stories->latest('created_at');

        return view('stories.index', ['stories' => $stories->paginate(10)->withQueryString()]);
    }

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'stories']);
    }
    
    public function create()
    {
        return view('stories.create');

    }

   
    public function store(StoreStoryRequest $request)
    {
        // 1. validacija
        $data = $request->validated();
    
        // 2. įkeliam paveikslėlį, jei yra
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('stories/covers', 'public');
        }
        if ($request->hasFile('avatar_image')) {
            $data['avatar_image'] = $request->file('avatar_image')->store('stories/avatars', 'public');
        }
    
        // 3. sukuriam įrašą DB
        Story::create($data);
    
        // 4. redirect su pranešimu
        return redirect()->route('main.index')->with('success', 'Story created!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        return view('stories.show', compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
