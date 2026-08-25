<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnsafeMedicineReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_number',
        'reporter_name',
        'reporter_phone',
        'medicine_name',
        'batch_number',
        'pharmacy_name',
        'pharmacy_address',
        'district',
        'description',
        'images',
        'video',
        'status',
        'is_blacklisted',
    ];

    protected $casts = [
        'images'         => 'array',
        'is_blacklisted' => 'boolean',
    ];

    /**
     * Automatically generate a unique tracking number before creating a record.
     * Format: UMR-YYYYMM-XXXX  (e.g. UMR-202606-A3F9)
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($report) {
            $report->tracking_number = static::generateTrackingNumber();
        });
    }

    /**
     * Generate a unique tracking number, retrying on the rare collision.
     */
    private static function generateTrackingNumber(): string
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        do {
            $suffix   = substr(str_shuffle($characters), 0, 4);
            $tracking = 'UMR-' . date('Ym') . '-' . $suffix;
        } while (static::where('tracking_number', $tracking)->exists());

        return $tracking;
    }
}
