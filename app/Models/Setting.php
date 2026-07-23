<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'key',
        'label',
        'type',
        'value',
        'image',
        'image_alt',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * NOTE: this assumes the same "public disk" convention used by icon_url /
     * listing_image_url etc. on your Category model. Adjust the disk/path
     * here if your existing accessor builds the URL differently.
     */
    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('backend/' . $this->image) : null;
    }

    /**
     * Fetch a single setting's display value by key.
     * For image-type settings this returns the image URL.
     * Usage: Setting::get('phone_number'), Setting::get('site_logo')
     */
    public static function get(string $key, $default = null)
    {
        $setting = static::where('key', $key)->where('is_active', true)->first();

        if (! $setting) {
            return $default;
        }

        return $setting->type === 'image' ? $setting->image_url : $setting->value;
    }

    /**
     * Fetch the alt text for an image-type setting.
     * Usage: Setting::getAlt('site_logo')
     */
    public static function getAlt(string $key, $default = null)
    {
        $setting = static::where('key', $key)->where('is_active', true)->first();

        return $setting?->image_alt ?? $default;
    }
}
