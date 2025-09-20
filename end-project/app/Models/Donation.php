<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    // Kiekviena auka priklauso vienai istorijai
    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    public function getDisplayDonorNameAttribute(): string
    {
        if ($this->is_anonymous) {
            return 'Anonymous Donor';
        }

        return $this->donor_full_name ?: 'Unknown Donor';
        // Blade faile:
        // <p><strong>Donor:</strong> {{ $donation->display_donor_name }}</p>
        // <p><strong>Amount:</strong> €{{ $donation->donated_amount }}</p>

    }

}
