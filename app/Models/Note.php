<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'note_date',
        'priority',
        'is_archived',
    ];

    protected $casts = [
        'note_date' => 'date',
        'is_archived' => 'boolean',
    ];

    /**
     * Get the user that owns the note.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include notes for a specific date.
     */
    public function scopeForDate($query, $date)
    {
        return $query->where('note_date', $date);
    }

    /**
     * Scope a query to only include active (non-archived) notes.
     */
    public function scopeActive($query)
    {
        return $query->where('is_archived', false);
    }

    /**
     * Scope a query to only include archived notes.
     */
    public function scopeArchived($query)
    {
        return $query->where('is_archived', true);
    }

    /**
     * Get the priority color class for Tailwind CSS.
     */
    public function getPriorityColorAttribute(): string
    {
        return match($this->priority) {
            'high' => 'text-red-600 bg-red-100',
            'medium' => 'text-yellow-600 bg-yellow-100',
            'low' => 'text-green-600 bg-green-100',
            'default' => 'text-gray-600 bg-gray-100',
        };
    }

    /**
     * Get the priority badge class for Tailwind CSS.
     */
    public function getPriorityBadgeClassAttribute(): string
    {
        return match($this->priority) {
            'high' => 'bg-red-100 text-red-800',
            'medium' => 'bg-yellow-100 text-yellow-800',
            'low' => 'bg-green-100 text-green-800',
            'default' => 'bg-gray-100 text-gray-800',
        };
    }
}
