<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurStory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get only active Our Story records.
     */
    public function scopeIsActive($query)
    {
        return $query->where('is_active', 0);
    }

    /**
     * Get records which are not deleted.
     */
    public function scopeNotDeleted($query)
    {
        return $query->whereNull('deleted_at');
    }
}