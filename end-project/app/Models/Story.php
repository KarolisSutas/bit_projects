<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Story extends Model
{

    use HasFactory;

    protected $fillable = [
        'full_name', 
        'story_title',
        'description', 
        'required_amount',
        'collected_amount', 
        'category',
        'is_completed',
        'is_approved', 
        ];

    protected $casts = [
        'required_amount'  => 'decimal:2',
        'collected_amount' => 'decimal:2',
        'is_completed'     => 'boolean',
    ];

    public static array $category = [
        'health',
        'education',
        'hobbies',
        'travel'
    ];

    public function donations()
    {
        return $this->hasMany(\App\Models\Donation::class);
    }


    // $stories = Story::where('is_approved', true)->get();

    // // style="width: {{ $story->progress_percent }}%;"
    public function getProgressPercentAttribute(): int
    {
        if ($this->required_amount == 0) {
        return 0;
        }
        return (int) floor(($this->collected_amount / $this->required_amount) * 100);
    }

}
