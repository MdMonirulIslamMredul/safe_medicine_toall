@extends('admin.master')

@section('title', ' - Edit Medicine')

@section('body')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor font-weight-bold"><i class="fa fa-edit text-primary mr-2"></i> Edit Medicine: {{ $medicine->name }}</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.medicines.index') }}">Medicines</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <h5 class="font-weight-bold"><i class="fa fa-exclamation-triangle"></i> Please fix the following errors:</h5>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<form action="{{ route('admin.medicines.update', $medicine->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- 1. Bangladesh Medicine Core Information -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <i class="fa fa-pills mr-2 fa-lg"></i>
            <h5 class="mb-0 font-weight-bold text-white">1. Bangladesh Drug Regulatory &amp; Brand Details</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="font-weight-bold">Brand Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $medicine->name) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="font-weight-bold">Generic Name <span class="text-danger">*</span></label>
                    <input type="text" name="generic_name" class="form-control" value="{{ old('generic_name', $medicine->generic_name) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="font-weight-bold">Manufacturer / Company <span class="text-danger">*</span></label>
                    <input type="text" name="manufacturer" class="form-control" value="{{ old('manufacturer', $medicine->manufacturer) }}" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="font-weight-bold">Dosage Form <span class="text-danger">*</span></label>
                    <select name="dosage_form" class="form-control" required>
                        @foreach(['Tablet', 'Capsule', 'Syrup', 'Suspension', 'Injection', 'Eye Drop', 'Ointment', 'Inhaler', 'Suppository', 'Oral Saline / Powder'] as $form)
                            <option value="{{ $form }}" {{ old('dosage_form', $medicine->dosage_form) == $form ? 'selected' : '' }}>{{ $form }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="font-weight-bold">Strength / Dosage</label>
                    <input type="text" name="strength" class="form-control" value="{{ old('strength', $medicine->strength) }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="font-weight-bold">DAR Number (DGDA Reg. No.)</label>
                    <input type="text" name="dar_number" class="form-control" value="{{ old('dar_number', $medicine->dar_number) }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="font-weight-bold">Unit MRP Price (BDT ৳)</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $medicine->price) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="font-weight-bold">Therapeutic Category</label>
                    <input type="text" name="therapeutic_class" class="form-control" value="{{ old('therapeutic_class', $medicine->therapeutic_class) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="font-weight-bold">Safety Assessment Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control font-weight-bold" required>
                        <option value="safe" class="text-success font-weight-bold" {{ old('status', $medicine->status) == 'safe' ? 'selected' : '' }}>✓ Safe &amp; Authentic (DGDA Approved)</option>
                        <option value="unsafe" class="text-danger font-weight-bold" {{ old('status', $medicine->status) == 'unsafe' ? 'selected' : '' }}>⚠️ Counterfeit / Fake Drug Alert (Unsafe)</option>
                        <option value="warning" class="text-warning font-weight-bold" {{ old('status', $medicine->status) == 'warning' ? 'selected' : '' }}>⚡ Quality Warning / Recalled Batch</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3 d-flex align-items-center">
                    <div class="custom-control custom-checkbox mt-3">
                        <input type="checkbox" class="custom-control-input" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $medicine->is_featured) ? 'checked' : '' }}>
                        <label class="custom-control-label font-weight-bold text-dark" for="is_featured">Feature on Verification Portal Homepage</label>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <label class="font-weight-bold">Safety Verdict / High-level Alert Summary</label>
                    <textarea name="safety_verdict" rows="2" class="form-control">{{ old('safety_verdict', $medicine->safety_verdict) }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Authenticity & Fake Drug Checkpoints Guide -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-dark text-white d-flex align-items-center">
            <i class="fa fa-shield-alt mr-2 fa-lg text-warning"></i>
            <h5 class="mb-0 font-weight-bold text-white">2. Consumer Authenticity Guide &amp; Fake Drug Red Flags</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold text-success">
                        <i class="fa fa-check-circle mr-1"></i> Authentic Packaging Features (Checkpoints)
                    </label>
                    <textarea name="authentic_features" rows="5" class="form-control border-success">{{ old('authentic_features', $medicine->authentic_features) }}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold text-danger">
                        <i class="fa fa-exclamation-triangle mr-1"></i> Fake / Counterfeit / Copy Drug Red Flags
                    </label>
                    <textarea name="fake_indicators" rows="5" class="form-control border-danger">{{ old('fake_indicators', $medicine->fake_indicators) }}</textarea>
                </div>

                <div class="col-md-12 mb-2">
                    <label class="font-weight-bold">Affected / Counterfeit Batch Numbers</label>
                    <input type="text" name="affected_batches" class="form-control" value="{{ old('affected_batches', $medicine->affected_batches) }}">
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Existing & New Safe Images -->
    <div class="card shadow-sm border-0 mb-4 border-left-success" style="border-left: 5px solid #10b981;">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <span class="badge badge-success p-2 mr-2"><i class="fa fa-shield-alt"></i> Safe Images ({{ $medicine->safeImages->count() }})</span>
                <h5 class="mb-0 font-weight-bold text-success">Authentic / Safe Medicine Images</h5>
            </div>
            <button type="button" class="btn btn-sm btn-success text-white font-weight-bold" onclick="addSafeImageRow()">
                <i class="fa fa-plus"></i> Upload More Safe Images
            </button>
        </div>
        <div class="card-body">
            <!-- Existing Safe Images -->
            @if($medicine->safeImages->count() > 0)
                <h6 class="font-weight-bold text-dark mb-3">Existing Authentic Images:</h6>
                <div class="row mb-4">
                    @foreach($medicine->safeImages as $safeImg)
                        <div class="col-md-6 mb-3" id="image-card-{{ $safeImg->id }}">
                            <div class="border rounded p-2 bg-white shadow-xs d-flex align-items-center">
                                <img src="{{ $safeImg->url }}" alt="{{ $safeImg->title }}" class="rounded mr-3" style="width: 80px; height: 80px; object-fit: cover; border: 1px solid #10b981;">
                                <div class="flex-grow-1 mr-2">
                                    <input type="text" name="existing_image_titles[{{ $safeImg->id }}]" class="form-control form-control-sm mb-1" value="{{ $safeImg->title }}" placeholder="Title / Caption">
                                    <input type="text" name="existing_image_highlights[{{ $safeImg->id }}]" class="form-control form-control-sm" value="{{ $safeImg->highlight_points }}" placeholder="Authentic Marker Note">
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteExistingImage({{ $safeImg->id }})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- New Safe Images Container -->
            <div id="newSafeImagesContainer"></div>
        </div>
    </div>

    <!-- 4. Existing & New Unsafe / Fake Images -->
    <div class="card shadow-sm border-0 mb-4 border-left-danger" style="border-left: 5px solid #ef4444;">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <span class="badge badge-danger p-2 mr-2"><i class="fa fa-exclamation-triangle"></i> Unsafe Images ({{ $medicine->unsafeImages->count() }})</span>
                <h5 class="mb-0 font-weight-bold text-danger">Counterfeit / Fake Drug Images</h5>
            </div>
            <button type="button" class="btn btn-sm btn-danger text-white font-weight-bold" onclick="addUnsafeImageRow()">
                <i class="fa fa-plus"></i> Upload More Fake Drug Images
            </button>
        </div>
        <div class="card-body">
            <!-- Existing Unsafe Images -->
            @if($medicine->unsafeImages->count() > 0)
                <h6 class="font-weight-bold text-dark mb-3">Existing Fake Drug Images:</h6>
                <div class="row mb-4">
                    @foreach($medicine->unsafeImages as $unsafeImg)
                        <div class="col-md-6 mb-3" id="image-card-{{ $unsafeImg->id }}">
                            <div class="border rounded p-2 bg-white shadow-xs d-flex align-items-center border-danger">
                                <img src="{{ $unsafeImg->url }}" alt="{{ $unsafeImg->title }}" class="rounded mr-3" style="width: 80px; height: 80px; object-fit: cover; border: 1px solid #ef4444;">
                                <div class="flex-grow-1 mr-2">
                                    <input type="text" name="existing_image_titles[{{ $unsafeImg->id }}]" class="form-control form-control-sm mb-1" value="{{ $unsafeImg->title }}" placeholder="Warning Title / Caption">
                                    <input type="text" name="existing_image_highlights[{{ $unsafeImg->id }}]" class="form-control form-control-sm" value="{{ $unsafeImg->highlight_points }}" placeholder="Red Flag Callout Note">
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteExistingImage({{ $unsafeImg->id }})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- New Unsafe Images Container -->
            <div id="newUnsafeImagesContainer"></div>
        </div>
    </div>

    <!-- 5. Medical Specifications -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0 font-weight-bold text-secondary"><i class="fa fa-file-medical mr-2"></i> 3. Clinical &amp; Medical Details</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Indications &amp; Uses</label>
                    <textarea name="indications" rows="3" class="form-control">{{ old('indications', $medicine->indications) }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Dosage &amp; Administration Summary</label>
                    <textarea name="dosage_guidelines" rows="3" class="form-control">{{ old('dosage_guidelines', $medicine->dosage_guidelines) }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Precautions &amp; Side Effects</label>
                    <textarea name="side_effects" rows="3" class="form-control">{{ old('side_effects', $medicine->side_effects) }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Storage Conditions</label>
                    <textarea name="storage_condition" rows="3" class="form-control">{{ old('storage_condition', $medicine->storage_condition) }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Bar -->
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-body text-right">
            <a href="{{ route('admin.medicines.index') }}" class="btn btn-secondary px-4 mr-2">Cancel</a>
            <button type="submit" class="btn btn-primary px-5 font-weight-bold text-white">
                <i class="fa fa-save mr-1"></i> Update Medicine &amp; Images
            </button>
        </div>
    </div>
</form>

<script>
let safeIndex = 1;
let unsafeIndex = 1;

function previewImage(input, previewId) {
    const container = document.getElementById(previewId);
    container.innerHTML = '';
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '45px';
            img.style.height = '45px';
            img.style.objectFit = 'cover';
            img.style.borderRadius = '6px';
            container.appendChild(img);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function addSafeImageRow() {
    const container = document.getElementById('newSafeImagesContainer');
    const newRow = document.createElement('div');
    newRow.className = 'safe-image-row p-3 mb-3 border rounded bg-white shadow-xs';
    const currentIdx = safeIndex++;
    newRow.innerHTML = `
        <div class="row align-items-center">
            <div class="col-md-4 mb-2">
                <label class="font-weight-bold font-12">New Safe Image File</label>
                <input type="file" name="new_safe_images[]" class="form-control-file border p-1 rounded" accept="image/*" onchange="previewImage(this, 'new_safe_prev_${currentIdx}')">
            </div>
            <div class="col-md-4 mb-2">
                <label class="font-weight-bold font-12">Image Title / Caption</label>
                <input type="text" name="new_safe_image_titles[]" class="form-control form-control-sm" placeholder="e.g. Box Hologram Close-up">
            </div>
            <div class="col-md-3 mb-2">
                <label class="font-weight-bold font-12">Key Authentic Marker Note</label>
                <input type="text" name="new_safe_image_highlights[]" class="form-control form-control-sm" placeholder="e.g. Crisp embossed font">
            </div>
            <div class="col-md-1 text-center mb-2 d-flex align-items-center justify-content-between">
                <div id="new_safe_prev_${currentIdx}"></div>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('.safe-image-row').remove()">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
    `;
    container.appendChild(newRow);
}

function addUnsafeImageRow() {
    const container = document.getElementById('newUnsafeImagesContainer');
    const newRow = document.createElement('div');
    newRow.className = 'unsafe-image-row p-3 mb-3 border rounded bg-white shadow-xs';
    const currentIdx = unsafeIndex++;
    newRow.innerHTML = `
        <div class="row align-items-center">
            <div class="col-md-4 mb-2">
                <label class="font-weight-bold font-12">New Unsafe/Fake Image File</label>
                <input type="file" name="new_unsafe_images[]" class="form-control-file border p-1 rounded" accept="image/*" onchange="previewImage(this, 'new_unsafe_prev_${currentIdx}')">
            </div>
            <div class="col-md-4 mb-2">
                <label class="font-weight-bold font-12">Warning Title / Caption</label>
                <input type="text" name="new_unsafe_image_titles[]" class="form-control form-control-sm" placeholder="e.g. Counterfeit Blister Back">
            </div>
            <div class="col-md-3 mb-2">
                <label class="font-weight-bold font-12">Red Flag Callout Note</label>
                <input type="text" name="new_unsafe_image_highlights[]" class="form-control form-control-sm" placeholder="e.g. Typo in manufacturer name">
            </div>
            <div class="col-md-1 text-center mb-2 d-flex align-items-center justify-content-between">
                <div id="new_unsafe_prev_${currentIdx}"></div>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('.unsafe-image-row').remove()">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
    `;
    container.appendChild(newRow);
}

function deleteExistingImage(imageId) {
    if (!confirm('Are you sure you want to permanently delete this image?')) {
        return;
    }

    fetch(`/admin/medicines/images/${imageId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const card = document.getElementById(`image-card-${imageId}`);
            if (card) {
                card.remove();
            }
        }
    })
    .catch(err => {
        console.error(err);
        alert('Could not delete image. Please try again.');
    });
}
</script>
@endsection
