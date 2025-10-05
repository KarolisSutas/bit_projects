<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Story;
use App\Http\Requests\StoreDonationRequest;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    public function store(Request $request, Story $story)
    {
        // Validacija: jeigu ne anonimiškai – reikalingas vardas
        $validated = $request->validate([
            'donor_full_name' => ['nullable','string','max:255','exclude_if:is_anonymous, 1'],
            'is_anonymous'    => ['nullable','boolean'],
            'donated_amount'  => ['required','integer','min:1'],
        ]);


        DB::transaction(function () use ($validated, $story) {
            // 1) Sukuriam auką
            $story->donations()->create([
                'donor_full_name' => !empty($validated['is_anonymous']) ? null : ($validated['donor_full_name'] ?? null),
                'is_anonymous'    => (bool)($validated['is_anonymous'] ?? false),
                'donated_amount'  => (int)$validated['donated_amount'],
            ]);
    
            // 2) Perskaičiuojam collected_amount nuo nulio (patikimiausia)
            $story->collected_amount = (int) $story->donations()->sum('donated_amount');
    
            // 3) Jei turi lauką is_completed – uždaryk, kai pasiekta
            if (isset($story->required_amount)) {
                $story->is_completed = $story->collected_amount >= (int)$story->required_amount;
            }
    
            $story->save();
        });
        return redirect()->route('main.show', $story)
        ->with('info', 'This story has already been completed. Donations are closed.');
    }
}
