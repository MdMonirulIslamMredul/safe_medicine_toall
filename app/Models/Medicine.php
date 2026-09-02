<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'generic_name',
        'manufacturer',
        'dosage_form',
        'strength',
        'dar_number',
        'price',
        'therapeutic_class',
        'status',
        'safety_verdict',
        'indications',
        'dosage_guidelines',
        'side_effects',
        'storage_condition',
        'authentic_features',
        'fake_indicators',
        'affected_batches',
        'is_featured',
        'view_count',
    ];

    protected $casts = [
        'price'       => 'decimal:2',
        'is_featured' => 'boolean',
        'view_count'  => 'integer',
    ];

    /**
     * All associated images
     */
    public function images()
    {
        return $this->hasMany(MedicineImage::class)->orderBy('sort_order', 'asc');
    }

    /**
     * Safe / Authentic images
     */
    public function safeImages()
    {
        return $this->hasMany(MedicineImage::class)
            ->where('type', 'safe')
            ->orderBy('sort_order', 'asc');
    }

    /**
     * Unsafe / Counterfeit images
     */
    public function unsafeImages()
    {
        return $this->hasMany(MedicineImage::class)
            ->where('type', 'unsafe')
            ->orderBy('sort_order', 'asc');
    }

    /**
     * Primary Safe Image
     */
    public function primarySafeImage()
    {
        return $this->hasOne(MedicineImage::class)
            ->where('type', 'safe')
            ->orderByDesc('is_primary')
            ->orderBy('sort_order', 'asc');
    }

    /**
     * Primary Unsafe Image
     */
    public function primaryUnsafeImage()
    {
        return $this->hasOne(MedicineImage::class)
            ->where('type', 'unsafe')
            ->orderByDesc('is_primary')
            ->orderBy('sort_order', 'asc');
    }

    /**
     * Helper to get a cover image (prefer safe primary, then any safe, then any image)
     */
    public function getCoverImageUrlAttribute(): string
    {
        $primary = $this->safeImages()->first() ?? $this->images()->first();
        if ($primary && file_exists(public_path($primary->image_path))) {
            return asset($primary->image_path);
        }
        return asset('uploads/medicines/default-medicine.svg');
    }

    /**
     * Scope for searching
     */
    public function scopeSearch($query, $term)
    {
        if (empty($term)) {
            return $query;
        }

        return $query->where(function ($q) use ($term) {
            $q->where('name', 'LIKE', "%{$term}%")
              ->orWhere('generic_name', 'LIKE', "%{$term}%")
              ->orWhere('manufacturer', 'LIKE', "%{$term}%")
              ->orWhere('dar_number', 'LIKE', "%{$term}%")
              ->orWhere('therapeutic_class', 'LIKE', "%{$term}%")
              ->orWhere('affected_batches', 'LIKE', "%{$term}%");
        });
    }

    /**
     * Status Label & Badge formatting
     */
    public function getStatusBadgeAttribute(): array
    {
        switch ($this->status) {
            case 'safe':
                return [
                    'label' => 'Authentic & Safe',
                    'label_bn' => 'আসল ও নিরাপদ',
                    'class' => 'badge-success',
                    'color' => '#10b981',
                    'bg' => '#d1fae5',
                    'icon' => 'fa-check-circle',
                ];
            case 'unsafe':
                return [
                    'label' => 'Unsafe / Fake Drug Warning',
                    'label_bn' => 'নকল / ঝুঁকিপূর্ণ ঔষধ সতর্কতা',
                    'class' => 'badge-danger',
                    'color' => '#ef4444',
                    'bg' => '#fee2e2',
                    'icon' => 'fa-exclamation-triangle',
                ];
            case 'warning':
            default:
                return [
                    'label' => 'Quality Alert / Recalled Batch',
                    'label_bn' => 'গুণমান সতর্কতা / প্রত্যাহারকৃত',
                    'class' => 'badge-warning',
                    'color' => '#f59e0b',
                    'bg' => '#fef3c7',
                    'icon' => 'fa-exclamation-circle',
                ];
        }
    }
}
