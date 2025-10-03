<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;


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
        'cover_image',
        'avatar_image'
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
        'Approved',
        'Completed'
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

    // Hook'as kuris paleidžiamas prieš delete
    protected static function booted()
    {
        static::deleting(function ($story) {
            // Ištrinam cover nuotrauką jeigu yra
            if ($story->cover_image) {
                Storage::disk('public')->delete($story->cover_image);
            }

            // Ištrinam avatar nuotrauką jeigu yra
            if ($story->avatar_image) {
                Storage::disk('public')->delete($story->avatar_image);
            }

            // Ištrinam donations jei nėra DB cascade
            $story->donations()->delete();
        });
    }
    
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }
    
    protected $appends = ['cover_url', 'avatar_url'];

    public function getCoverUrlAttribute(): ?string
    {
        return $this->cover_image ? Storage::disk('public')->url($this->cover_image) : null;
    }

    public function getAvatarUrlAttribute(): ?string
    {
        return $this->avatar_image ? Storage::disk('public')->url($this->avatar_image) : null;
    }

}
