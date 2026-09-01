@extends('admin.master')

@section('title', ' - Add New Member')

@section('body')
<div class="row page-titles">
    <div class="col-md-6 align-self-center">
        <h4 class="text-themecolor font-weight-bold">
            <i class="fa fa-user-plus text-theme-colored mr-2"></i> Add New Member (নতুন সদস্য যুক্ত করুন)
        </h4>
    </div>
    <div class="col-md-6 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.members.index') }}">Members</a></li>
                <li class="breadcrumb-item active">Add Member</li>
            </ol>
            <a href="{{ route('admin.members.index') }}" class="btn btn-secondary font-weight-bold ml-2">
                <i class="fa fa-arrow-left mr-1"></i> Back to Members
            </a>
        </div>
    </div>
</div>

<form action="{{ route('admin.members.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <!-- Left Column: Primary Information -->
        <div class="col-lg-8">
            <!-- Basic Information Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white font-weight-bold">
                    <i class="fa fa-user mr-1"></i> Basic Member Information
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Full Name (English) <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name') }}" placeholder="e.g., Dr. Mohammad Ali" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Full Name (Bangla / বাংলা)</label>
                            <input type="text" name="name_bn" class="form-control @error('name_bn') is-invalid @enderror" 
                                   value="{{ old('name_bn') }}" placeholder="যেমন: ড. মোহাম্মদ আলী">
                            @error('name_bn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Father's Name</label>
                            <input type="text" name="father_name" class="form-control" value="{{ old('father_name') }}" placeholder="Father's name">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Mother's Name</label>
                            <input type="text" name="mother_name" class="form-control" value="{{ old('mother_name') }}" placeholder="Mother's name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                                   value="{{ old('phone') }}" placeholder="e.g., 017xxxxxxxx" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Email Address</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ old('email') }}" placeholder="e.g., member@example.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Designation (English)</label>
                            <input type="text" name="designation" class="form-control" value="{{ old('designation') }}" placeholder="e.g., President, Advisor, Executive Member">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Designation (Bangla / বাংলা)</label>
                            <input type="text" name="designation_bn" class="form-control" value="{{ old('designation_bn') }}" placeholder="যেমন: সভাপতি, প্রধান উপদেষ্টা, সদস্য">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Profession / Occupation</label>
                            <input type="text" name="profession" class="form-control" value="{{ old('profession') }}" placeholder="e.g., Doctor, Pharmacist, Professor">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Organization / Institute</label>
                            <input type="text" name="organization" class="form-control" value="{{ old('organization') }}" placeholder="e.g., Dhaka Medical College">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address & Additional Info Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-secondary text-white font-weight-bold">
                    <i class="fa fa-map-marker mr-1"></i> Address &amp; Other Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Blood Group</label>
                            <select name="blood_group" class="form-control">
                                <option value="">— Select Blood Group —</option>
                                @foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $bg)
                                    <option value="{{ $bg }}" {{ old('blood_group') == $bg ? 'selected' : '' }}>{{ $bg }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">— Select Gender —</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">NID / Passport No.</label>
                            <input type="text" name="nid_passport" class="form-control" value="{{ old('nid_passport') }}" placeholder="NID or Passport number">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Present Address</label>
                            <textarea name="present_address" class="form-control" rows="3" placeholder="Present address...">{{ old('present_address') }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Permanent Address</label>
                            <textarea name="permanent_address" class="form-control" rows="3" placeholder="Permanent address...">{{ old('permanent_address') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Short Bio / Notes</label>
                        <textarea name="bio" class="form-control" rows="3" placeholder="Brief biography or background notes...">{{ old('bio') }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Facebook Profile URL</label>
                            <input type="url" name="facebook" class="form-control" value="{{ old('facebook') }}" placeholder="https://facebook.com/username">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">LinkedIn Profile URL</label>
                            <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin') }}" placeholder="https://linkedin.com/in/username">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Settings & Photo -->
        <div class="col-lg-4">
            <!-- Category & Status Settings -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-dark text-white font-weight-bold">
                    <i class="fa fa-cogs mr-1"></i> Membership &amp; Status
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Member Category <span class="text-danger">*</span></label>
                        <select name="member_category_id" class="form-control @error('member_category_id') is-invalid @enderror" required>
                            <option value="">— Select Category —</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('member_category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }} @if($cat->name_bn) ({{ $cat->name_bn }}) @endif
                                </option>
                            @endforeach
                        </select>
                        @error('member_category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Approval Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control font-weight-bold" required>
                            <option value="approved" class="text-success" {{ old('status', 'approved') == 'approved' ? 'selected' : '' }}>✓ Approved (অনুমোদিত)</option>
                            <option value="pending" class="text-warning" {{ old('status') == 'pending' ? 'selected' : '' }}>⏳ Pending (অপেক্ষমাণ)</option>
                            <option value="rejected" class="text-danger" {{ old('status') == 'rejected' ? 'selected' : '' }}>✕ Rejected (বাতিল)</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Member ID / Code (Optional)</label>
                        <input type="text" name="member_id_no" class="form-control" value="{{ old('member_id_no') }}" placeholder="e.g., SM-2026-001">
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Display Order / Serial</label>
                        <input type="number" name="order_index" class="form-control" value="{{ old('order_index', 0) }}" min="0">
                        <small class="text-muted">Lower numbers appear first in lists.</small>
                    </div>

                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="is_featured" value="1" class="custom-control-input" id="featCheck" {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="custom-control-label font-weight-bold" for="featCheck">Featured Member</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Member Photo Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-info text-white font-weight-bold">
                    <i class="fa fa-camera mr-1"></i> Member Photo (সদস্যের ছবি)
                </div>
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img id="photoPreview" src="{{ asset('frontend/images/team/member-placeholder.png') }}" 
                             alt="Member Photo Preview" class="img-thumbnail rounded-circle border" 
                             style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <div class="form-group mb-0">
                        <label class="btn btn-outline-primary btn-block font-weight-bold mb-2">
                            <i class="fa fa-upload mr-1"></i> Choose Member Photo
                            <input type="file" name="photo" id="photoInput" class="d-none" accept="image/*" onchange="previewImage(this)">
                        </label>
                        <small class="text-muted d-block">Recommended: Square format (400x400), Max 3MB (JPG, PNG, WebP)</small>
                    </div>
                </div>
            </div>

            <!-- Submit Button Card -->
            <div class="card shadow-sm border-0">
                <div class="card-body p-3">
                    <button type="submit" class="btn btn-success btn-lg btn-block font-weight-bold text-white">
                        <i class="fa fa-check-circle mr-1"></i> Save Member
                    </button>
                    <a href="{{ route('admin.members.index') }}" class="btn btn-outline-secondary btn-block mt-2">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('photoPreview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
