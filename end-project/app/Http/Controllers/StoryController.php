<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

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

        return view('story.index', ['stories' => $stories->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        return view('story.show', compact('story'));
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
