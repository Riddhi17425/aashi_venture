<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrustedPartner extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'logo',
        'logo_alt',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo ? asset('backend/' . $this->logo) : null;
    }
}
