<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'short_note',
        'description',
        'mobile_image',
        'mobile_image_alt',
        'desktop_image',
        'desktop_image_alt',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'sort_order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getMobileImageUrlAttribute(): ?string
    {
        return $this->mobile_image ? asset('backend/' . $this->mobile_image) : null;
    }

    public function getDesktopImageUrlAttribute(): ?string
    {
        return $this->desktop_image ? asset('backend/' . $this->desktop_image) : null;
    }

    /**
     * The URL the banner's CTA button should point to — always derived live
     * from the parent category, so it never goes stale if the category's
     * slug changes later.
     *
     * There's no named frontend route for a category page yet, so this
     * builds a plain URL from the slug: /category/{category_url}.
     *
     * Once you add the real frontend route, replace the url() line below
     * with: route('category.show', $this->category->category_url)
     * — and update the path prefix here to match whatever you land on.
     */
    public function getCtaUrlAttribute(): ?string
    {
        if (! $this->category) {
            return null;
        }

        return url('/category/' . $this->category->category_url);
    }
}
