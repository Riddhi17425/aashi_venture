<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'category_url',
        'short_note',
        'icon',
        'description',
        'detail_page_title',
        'detail_page_shortnote',
        'listing_image',
        'listing_image_alt',
        'detail_image',
        'detail_image_alt',
        'brochure_pdf',
        'stats',
        'meta_title',
        'meta_description',
        'is_active',
    ];

    protected $casts = [
        'stats'     => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Placeholder for future relations (sub-categories, products).
     * Wire this up once those modules exist so delete/deactivate
     * are blocked when a category is in use.
     */
    public function hasAssociations(): bool
    {
        return false;
    }

    public function blogs()
    {
        return $this->hasMany(\App\Models\Blog::class);
    }

    public function subCategories()
    {
        return $this->hasMany(\App\Models\SubCategory::class);
    }

    public function getIconUrlAttribute(): ?string
    {
        return $this->icon ? asset('backend/' . $this->icon) : null;
    }

    public function getListingImageUrlAttribute(): ?string
    {
        return $this->listing_image ? asset('backend/' . $this->listing_image) : null;
    }

    public function getDetailImageUrlAttribute(): ?string
    {
        return $this->detail_image ? asset('backend/' . $this->detail_image) : null;
    }

    public function getBrochureUrlAttribute(): ?string
    {
        return $this->brochure_pdf ? asset('backend/' . $this->brochure_pdf) : null;
    }
}
