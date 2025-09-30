<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'story_id',
        'donor_full_name',
        'is_anonymous',
        'donated_amount',
    ];

    protected $casts = [
        'is_anonymous'   => 'boolean',
        'donated_amount' => 'decimal:2',
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

 

    //completed
    // $story->collected_amount += $donation->donated_amount;
    // $story->save();

    // $story->toggleComplete();

}
