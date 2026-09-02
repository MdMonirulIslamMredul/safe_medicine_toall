@extends('admin.master')

@section('title', ' - Add Medicine Information')

@section('body')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor font-weight-bold"><i class="fa fa-plus-circle text-info mr-2"></i> Add Medicine Information</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.medicines.index') }}">Medicines</a></li>
            <li class="breadcrumb-item active">Add New</li>
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

<form action="{{ route('admin.medicines.store') }}" method="POST" enctype="multipart/form-data" id="medicineForm">
    @csrf

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
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="e.g. Napa Extra, Seclo 20, Sergel 20" value="{{ old('name') }}" required>
                    <small class="text-muted">Common commercial trade name</small>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="font-weight-bold">Generic Name <span class="text-danger">*</span></label>
                    <input type="text" name="generic_name" class="form-control @error('generic_name') is-invalid @enderror" placeholder="e.g. Paracetamol + Caffeine, Omeprazole" value="{{ old('generic_name') }}" required>
                    <small class="text-muted">Active pharmaceutical ingredient(s)</small>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="font-weight-bold">Manufacturer / Company <span class="text-danger">*</span></label>
                    <input type="text" name="manufacturer" class="form-control @error('manufacturer') is-invalid @enderror" placeholder="e.g. Beximco Pharmaceuticals Ltd., Square Pharma" value="{{ old('manufacturer') }}" required>
                    <small class="text-muted">Pharma manufacturing company in Bangladesh</small>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="font-weight-bold">Dosage Form <span class="text-danger">*</span></label>
                    <select name="dosage_form" class="form-control" required>
                        <option value="Tablet" {{ old('dosage_form') == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                        <option value="Capsule" {{ old('dosage_form') == 'Capsule' ? 'selected' : '' }}>Capsule</option>
                        <option value="Syrup" {{ old('dosage_form') == 'Syrup' ? 'selected' : '' }}>Syrup</option>
                        <option value="Suspension" {{ old('dosage_form') == 'Suspension' ? 'selected' : '' }}>Suspension</option>
                        <option value="Injection" {{ old('dosage_form') == 'Injection' ? 'selected' : '' }}>Injection</option>
                        <option value="Eye Drop" {{ old('dosage_form') == 'Eye Drop' ? 'selected' : '' }}>Eye Drop</option>
                        <option value="Ointment" {{ old('dosage_form') == 'Ointment' ? 'selected' : '' }}>Ointment</option>
                        <option value="Inhaler" {{ old('dosage_form') == 'Inhaler' ? 'selected' : '' }}>Inhaler</option>
                        <option value="Suppository" {{ old('dosage_form') == 'Suppository' ? 'selected' : '' }}>Suppository</option>
                        <option value="Oral Saline / Powder" {{ old('dosage_form') == 'Oral Saline / Powder' ? 'selected' : '' }}>Oral Saline / Powder</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="font-weight-bold">Strength / Dosage</label>
                    <input type="text" name="strength" class="form-control" placeholder="e.g. 500 mg + 65 mg, 20 mg, 100 ml" value="{{ old('strength') }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="font-weight-bold">DAR Number (DGDA Reg. No.)</label>
                    <input type="text" name="dar_number" class="form-control" placeholder="e.g. DAR 025-0145-022" value="{{ old('dar_number') }}">
                    <small class="text-muted">Directorate General of Drug Administration No.</small>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="font-weight-bold">Unit MRP Price (BDT ৳)</label>
                    <input type="number" step="0.01" name="price" class="form-control" placeholder="e.g. 2.50" value="{{ old('price') }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="font-weight-bold">Therapeutic Category</label>
                    <input type="text" name="therapeutic_class" class="form-control" placeholder="e.g. Analgesic, Anti-ulcerant, Antibiotic" value="{{ old('therapeutic_class') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="font-weight-bold">Safety Assessment Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control font-weight-bold" required>
                        <option value="safe" class="text-success font-weight-bold" {{ old('status') == 'safe' ? 'selected' : '' }}>✓ Safe &amp; Authentic (DGDA Approved)</option>
                        <option value="unsafe" class="text-danger font-weight-bold" {{ old('status') == 'unsafe' ? 'selected' : '' }}>⚠️ Counterfeit / Fake Drug Alert (Unsafe)</option>
                        <option value="warning" class="text-warning font-weight-bold" {{ old('status') == 'warning' ? 'selected' : '' }}>⚡ Quality Warning / Recalled Batch</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3 d-flex align-items-center">
                    <div class="custom-control custom-checkbox mt-3">
                        <input type="checkbox" class="custom-control-input" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                        <label class="custom-control-label font-weight-bold text-dark" for="is_featured">Feature on Verification Portal Homepage</label>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <label class="font-weight-bold">Safety Verdict / High-level Alert Summary</label>
                    <textarea name="safety_verdict" rows="2" class="form-control" placeholder="e.g. Genuine DGDA approved drug. Fake copies with flat holograms have been reported in local markets.">{{ old('safety_verdict') }}</textarea>
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
                    <textarea name="authentic_features" rows="5" class="form-control border-success" placeholder="List specific genuine markers, e.g.:
1. 3D Optical Security Hologram that shifts colors under light.
2. Deeply embossed batch and expiry date on blister foil.
3. Crisp high-resolution company logo.
4. Official DGDA DAR Number printed on box flap.">{{ old('authentic_features') }}</textarea>
                    <small class="text-muted">Enter point-by-point indicators of genuine medicine.</small>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold text-danger">
                        <i class="fa fa-exclamation-triangle mr-1"></i> Fake / Counterfeit / Copy Drug Red Flags
                    </label>
                    <textarea name="fake_indicators" rows="5" class="form-control border-danger" placeholder="List specific counterfeit signs, e.g.:
1. Flat yellow/rainbow sticker instead of real 3D hologram.
2. Misspelled manufacturer name or brand name.
3. Black ink stamped dates instead of mechanical embossing.
4. Chalky or crumbling tablets.
5. Abnormally cheap retail price.">{{ old('fake_indicators') }}</textarea>
                    <small class="text-muted">Enter telltale signs to alert consumers about fake copies.</small>
                </div>

                <div class="col-md-12 mb-2">
                    <label class="font-weight-bold">Affected / Counterfeit Batch Numbers (If applicable)</label>
                    <input type="text" name="affected_batches" class="form-control" placeholder="e.g. Flagged Batches: NX-0099, SQ-FAKE-01" value="{{ old('affected_batches') }}">
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Safe / Authentic Images Upload Section -->
    <div class="card shadow-sm border-0 mb-4 border-left-success" style="border-left: 5px solid #10b981;">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <span class="badge badge-success p-2 mr-2"><i class="fa fa-shield-alt"></i> Safe Images</span>
                <h5 class="mb-0 font-weight-bold text-success">Upload Authentic / Safe Medicine Images</h5>
            </div>
            <button type="button" class="btn btn-sm btn-success text-white font-weight-bold" onclick="addSafeImageRow()">
                <i class="fa fa-plus"></i> Add Another Safe Image
            </button>
        </div>
        <div class="card-body">
            <p class="text-muted font-13 mb-3">
                Upload genuine packaging pictures (e.g. Box front with hologram, blister front, blister back with embossed expiry date, pill texture).
            </p>
            <div id="safeImagesContainer">
                <div class="safe-image-row p-3 mb-3 border rounded bg-white shadow-xs">
                    <div class="row align-items-center">
                        <div class="col-md-4 mb-2">
                            <label class="font-weight-bold font-12">Safe Image File <span class="text-danger">*</span></label>
                            <input type="file" name="safe_images[]" class="form-control-file border p-1 rounded" accept="image/*" onchange="previewImage(this, 'safe_prev_0')">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="font-weight-bold font-12">Image Title / Caption</label>
                            <input type="text" name="safe_image_titles[]" class="form-control form-control-sm" placeholder="e.g. Original Box with 3D Hologram">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="font-weight-bold font-12">Key Authentic Marker Note</label>
                            <input type="text" name="safe_image_highlights[]" class="form-control form-control-sm" placeholder="e.g. Notice the color-shift seal">
                        </div>
                        <div class="col-md-1 text-center mb-2">
                            <div id="safe_prev_0" class="img-preview-box"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Unsafe / Counterfeit Images Upload Section -->
    <div class="card shadow-sm border-0 mb-4 border-left-danger" style="border-left: 5px solid #ef4444;">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <span class="badge badge-danger p-2 mr-2"><i class="fa fa-exclamation-triangle"></i> Unsafe Images</span>
                <h5 class="mb-0 font-weight-bold text-danger">Upload Counterfeit / Fake / Copy Drug Images</h5>
            </div>
            <button type="button" class="btn btn-sm btn-danger text-white font-weight-bold" onclick="addUnsafeImageRow()">
                <i class="fa fa-plus"></i> Add Another Unsafe Image
            </button>
        </div>
        <div class="card-body">
            <p class="text-muted font-13 mb-3">
                Upload fake or copy drug examples (e.g. Blurry logo print, fake flat sticker, misspelling on foil, discolored pills).
            </p>
            <div id="unsafeImagesContainer">
                <div class="unsafe-image-row p-3 mb-3 border rounded bg-white shadow-xs">
                    <div class="row align-items-center">
                        <div class="col-md-4 mb-2">
                            <label class="font-weight-bold font-12">Unsafe/Fake Image File</label>
                            <input type="file" name="unsafe_images[]" class="form-control-file border p-1 rounded" accept="image/*" onchange="previewImage(this, 'unsafe_prev_0')">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="font-weight-bold font-12">Image Title / Warning Caption</label>
                            <input type="text" name="unsafe_image_titles[]" class="form-control form-control-sm" placeholder="e.g. Counterfeit Blister with Font Mismatch">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="font-weight-bold font-12">Red Flag Callout Note</label>
                            <input type="text" name="unsafe_image_highlights[]" class="form-control form-control-sm" placeholder="e.g. Red flag: Missing DGDA registration">
                        </div>
                        <div class="col-md-1 text-center mb-2">
                            <div id="unsafe_prev_0" class="img-preview-box"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 5. Medical Specifications (Optional Details) -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-light">
            <h5 class="mb-0 font-weight-bold text-secondary"><i class="fa fa-file-medical mr-2"></i> 3. Clinical &amp; Medical Details</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Indications &amp; Uses</label>
                    <textarea name="indications" rows="3" class="form-control" placeholder="e.g. Indicated for relief of mild to moderate fever and pain...">{{ old('indications') }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Dosage &amp; Administration Summary</label>
                    <textarea name="dosage_guidelines" rows="3" class="form-control" placeholder="e.g. 1-2 tablets every 4-6 hours...">{{ old('dosage_guidelines') }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Precautions &amp; Side Effects</label>
                    <textarea name="side_effects" rows="3" class="form-control" placeholder="e.g. Nausea, headache, skin rash...">{{ old('side_effects') }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="font-weight-bold">Storage Conditions</label>
                    <textarea name="storage_condition" rows="3" class="form-control" placeholder="e.g. Store below 30°C in a dry place...">{{ old('storage_condition') }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Button Bar -->
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-body text-right">
            <a href="{{ route('admin.medicines.index') }}" class="btn btn-secondary px-4 mr-2">Cancel</a>
            <button type="submit" class="btn btn-success px-5 font-weight-bold text-white">
                <i class="fa fa-save mr-1"></i> Save Medicine &amp; Images
            </button>
        </div>
    </div>
</form>

<style>
.font-12 { font-size: 12px; }
.font-13 { font-size: 13px; }
.img-preview-box img {
    width: 45px;
    height: 45px;
    object-fit: cover;
    border-radius: 6px;
    border: 1px solid #cbd5e1;
}
.shadow-xs { box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
</style>

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
            container.appendChild(img);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function addSafeImageRow() {
    const container = document.getElementById('safeImagesContainer');
    const newRow = document.createElement('div');
    newRow.className = 'safe-image-row p-3 mb-3 border rounded bg-white shadow-xs';
    const currentIdx = safeIndex++;
    newRow.innerHTML = `
        <div class="row align-items-center">
            <div class="col-md-4 mb-2">
                <label class="font-weight-bold font-12">Safe Image File</label>
                <input type="file" name="safe_images[]" class="form-control-file border p-1 rounded" accept="image/*" onchange="previewImage(this, 'safe_prev_${currentIdx}')">
            </div>
            <div class="col-md-4 mb-2">
                <label class="font-weight-bold font-12">Image Title / Caption</label>
                <input type="text" name="safe_image_titles[]" class="form-control form-control-sm" placeholder="e.g. Blister Foil Back & Hologram">
            </div>
            <div class="col-md-3 mb-2">
                <label class="font-weight-bold font-12">Key Authentic Marker Note</label>
                <input type="text" name="safe_image_highlights[]" class="form-control form-control-sm" placeholder="e.g. Check embossed expiry code">
            </div>
            <div class="col-md-1 text-center mb-2 d-flex align-items-center justify-content-between">
                <div id="safe_prev_${currentIdx}" class="img-preview-box"></div>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('.safe-image-row').remove()">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
    `;
    container.appendChild(newRow);
}

function addUnsafeImageRow() {
    const container = document.getElementById('unsafeImagesContainer');
    const newRow = document.createElement('div');
    newRow.className = 'unsafe-image-row p-3 mb-3 border rounded bg-white shadow-xs';
    const currentIdx = unsafeIndex++;
    newRow.innerHTML = `
        <div class="row align-items-center">
            <div class="col-md-4 mb-2">
                <label class="font-weight-bold font-12">Unsafe/Fake Image File</label>
                <input type="file" name="unsafe_images[]" class="form-control-file border p-1 rounded" accept="image/*" onchange="previewImage(this, 'unsafe_prev_${currentIdx}')">
            </div>
            <div class="col-md-4 mb-2">
                <label class="font-weight-bold font-12">Image Title / Warning Caption</label>
                <input type="text" name="unsafe_image_titles[]" class="form-control form-control-sm" placeholder="e.g. Fake packaging with typo">
            </div>
            <div class="col-md-3 mb-2">
                <label class="font-weight-bold font-12">Red Flag Callout Note</label>
                <input type="text" name="unsafe_image_highlights[]" class="form-control form-control-sm" placeholder="e.g. Mispelled company logo">
            </div>
            <div class="col-md-1 text-center mb-2 d-flex align-items-center justify-content-between">
                <div id="unsafe_prev_${currentIdx}" class="img-preview-box"></div>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="this.closest('.unsafe-image-row').remove()">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
    `;
    container.appendChild(newRow);
}
</script>
@endsection
