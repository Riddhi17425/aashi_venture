<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workspace extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'workspace_category_id',
        'image',
        'image_alt',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'sort_order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(WorkspaceCategory::class, 'workspace_category_id');
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('backend/' . $this->image) : null;
    }
}
