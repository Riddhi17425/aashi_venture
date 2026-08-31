<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leader extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'leader_title',
        'leader_image',
        'leader_description',
        'leader_name',
        'leader_designation',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getLeaderImageUrlAttribute(): ?string
    {
        return $this->leader_image ? asset('backend/' . $this->leader_image) : null;
    }
}