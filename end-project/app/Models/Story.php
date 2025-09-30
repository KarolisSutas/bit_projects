<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;


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
        'image' 
        ];

    protected $casts = [
        'required_amount'  => 'decimal:2',
        'collected_amount' => 'decimal:2',
        'is_completed'     => 'boolean',
        'is_approved'     => 'boolean',
    ];

    public static array $category = [
        'health',
        'education',
        'hobbies',
        'travel'
    ];

    public static array $status = [
        'Not Approved',
        'Approved'
        
 ];

    public function donations()
    {
        return $this->hasMany(\App\Models\Donation::class);
    }

    public function toggleApprove(): void
    {
        $this->is_approved = !$this->is_approved;
        $this->save();
    }

    public function getApprovedAttribute(): bool
    {
        return (bool) $this->is_approved;
    }

    public function toggleComplete(): void
    {
    if ($this->collected_amount >= $this->required_amount) {
        $this->is_completed = true;
        $this->save();
    }
    }

    
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }
    
    public function getProgressPercentAttribute(): int
    {
        if ($this->required_amount == 0) {
        return 0;
        }
        return (int) floor(($this->collected_amount / $this->required_amount) * 100);
    }

}
