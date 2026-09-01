<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_bn',
        'slug',
        'description',
        'order_index',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'order_index' => 'integer',
    ];

    /**
     * Relationship with members.
     */
    public function members()
    {
        return $this->hasMany(Member::class, 'member_category_id');
    }

    /**
     * Active scope.
     */
    public function scopeActive($query)
    {
        return $query->where('status', true)->orderBy('order_index', 'asc');
    }

    /**
     * Get display name based on active language.
     */
    public function getDisplayNameAttribute()
    {
        $lang = session()->get('language');
        if ($lang === 'bangla' && !empty($this->name_bn)) {
            return $this->name_bn;
        }
        return $this->name;
    }
}
