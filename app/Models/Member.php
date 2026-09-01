<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_category_id',
        'name',
        'name_bn',
        'father_name',
        'mother_name',
        'designation',
        'designation_bn',
        'organization',
        'profession',
        'phone',
        'email',
        'nid_passport',
        'blood_group',
        'gender',
        'present_address',
        'permanent_address',
        'photo',
        'bio',
        'facebook',
        'linkedin',
        'status',
        'rejection_reason',
        'order_index',
        'member_id_no',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'order_index' => 'integer',
    ];

    /**
     * Relationship with member category.
     */
    public function category()
    {
        return $this->belongsTo(MemberCategory::class, 'member_category_id');
    }

    /**
     * Scope for approved members only.
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope for pending members.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for rejected members.
     */
    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    /**
     * Scope for featured members.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Get display name based on current language.
     */
    public function getDisplayNameAttribute()
    {
        $lang = session()->get('language');
        if ($lang === 'bangla' && !empty($this->name_bn)) {
            return $this->name_bn;
        }
        return $this->name;
    }

    /**
     * Get display designation based on current language.
     */
    public function getDisplayDesignationAttribute()
    {
        $lang = session()->get('language');
        if ($lang === 'bangla' && !empty($this->designation_bn)) {
            return $this->designation_bn;
        }
        return $this->designation ?: 'Member';
    }

    /**
     * Get photo URL or fallback default avatar.
     */
    public function getPhotoUrlAttribute()
    {
        if (!empty($this->photo) && file_exists(public_path($this->photo))) {
            return asset($this->photo);
        }
        return asset('frontend/images/team/member-placeholder.png');
    }
}
