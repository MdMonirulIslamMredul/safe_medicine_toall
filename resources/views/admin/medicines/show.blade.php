@extends('admin.master')

@section('title', ' - Medicine Details')

@section('body')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor font-weight-bold"><i class="fa fa-info-circle text-info mr-2"></i> Medicine Details &amp; Verification</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.medicines.index') }}">Medicines</a></li>
            <li class="breadcrumb-item active">{{ $medicine->name }}</li>
        </ol>
        <a href="{{ route('admin.medicines.edit', $medicine->id) }}" class="btn btn-primary btn-sm font-weight-bold text-white ml-2">
            <i class="fa fa-edit"></i> Edit Medicine
        </a>
    </div>
</div>

@php
    $badge = $medicine->status_badge;
@endphp

<!-- Safety Status Banner -->
<div class="card shadow-sm border-0 mb-4" style="border-left: 6px solid {{ $badge['color'] }} !important;">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <span class="badge {{ $badge['class'] }} p-2 font-14 mb-2">
                <i class="fa {{ $badge['icon'] }} mr-1"></i> {{ $badge['label'] }} ({{ $badge['label_bn'] }})
            </span>
            <h3 class="font-weight-bold text-dark mb-1">{{ $medicine->name }} <span class="font-18 text-muted">({{ $medicine->strength ?? 'Standard' }})</span></h3>
            <p class="text-muted mb-0 font-14">
                <strong>Generic:</strong> {{ $medicine->generic_name }} | 
                <strong>Manufacturer:</strong> {{ $medicine->manufacturer }} | 
                <strong>DAR No:</strong> {{ $medicine->dar_number ?? 'N/A' }} | 
                <strong>Form:</strong> {{ $medicine->dosage_form }}
            </p>
        </div>
        <div class="text-right">
            @if($medicine->price)
                <div class="font-20 font-weight-bold text-success">৳ {{ number_format($medicine->price, 2) }}</div>
                <small class="text-muted">Unit MRP</small>
            @endif
        </div>
    </div>
</div>

@if($medicine->safety_verdict)
    <div class="alert alert-info shadow-sm mb-4">
        <h6 class="font-weight-bold mb-1"><i class="fa fa-bullhorn mr-1"></i> Safety Verdict &amp; Alert:</h6>
        <p class="mb-0">{{ $medicine->safety_verdict }}</p>
    </div>
@endif

<!-- Safe vs Unsafe Side-by-Side Images -->
<div class="row mb-4">
    <!-- Safe Authentic Column -->
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm border-0 h-100" style="border-top: 4px solid #10b981 !important;">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="mb-0 font-weight-bold text-success">
                    <i class="fa fa-shield-alt mr-2"></i> Authentic / Safe Packaging ({{ $medicine->safeImages->count() }})
                </h5>
                <span class="badge badge-success">Verified Genuine</span>
            </div>
            <div class="card-body">
                @if($medicine->authentic_features)
                    <div class="p-3 bg-light rounded mb-3 border">
                        <h6 class="font-weight-bold text-dark font-13 mb-2"><i class="fa fa-check-double text-success"></i> Genuine Packaging Features:</h6>
                        <p class="mb-0 text-muted font-13" style="white-space: pre-line;">{{ $medicine->authentic_features }}</p>
                    </div>
                @endif

                <div class="row">
                    @forelse($medicine->safeImages as $safeImg)
                        <div class="col-md-6 mb-3">
                            <div class="border rounded p-2 text-center h-100 bg-white">
                                <img src="{{ $safeImg->url }}" alt="{{ $safeImg->title }}" class="img-fluid rounded mb-2" style="max-height: 180px; object-fit: contain;">
                                <h6 class="font-weight-bold font-12 text-dark mb-1">{{ $safeImg->title ?? 'Authentic Packaging' }}</h6>
                                @if($safeImg->highlight_points)
                                    <small class="text-success d-block font-11 font-weight-600"><i class="fa fa-check"></i> {{ $safeImg->highlight_points }}</small>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4 text-muted">
                            <i class="fa fa-image fa-2x mb-2 d-block text-muted"></i>
                            No authentic images uploaded yet.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Unsafe Fake Column -->
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm border-0 h-100" style="border-top: 4px solid #ef4444 !important;">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="mb-0 font-weight-bold text-danger">
                    <i class="fa fa-exclamation-triangle mr-2"></i> Fake / Counterfeit Red Flags ({{ $medicine->unsafeImages->count() }})
                </h5>
                <span class="badge badge-danger">Danger / Warning</span>
            </div>
            <div class="card-body">
                @if($medicine->fake_indicators)
                    <div class="p-3 bg-light rounded mb-3 border border-danger">
                        <h6 class="font-weight-bold text-danger font-13 mb-2"><i class="fa fa-ban text-danger"></i> Counterfeit Indicators:</h6>
                        <p class="mb-0 text-muted font-13" style="white-space: pre-line;">{{ $medicine->fake_indicators }}</p>
                    </div>
                @endif

                <div class="row">
                    @forelse($medicine->unsafeImages as $unsafeImg)
                        <div class="col-md-6 mb-3">
                            <div class="border border-danger rounded p-2 text-center h-100 bg-white">
                                <img src="{{ $unsafeImg->url }}" alt="{{ $unsafeImg->title }}" class="img-fluid rounded mb-2" style="max-height: 180px; object-fit: contain;">
                                <h6 class="font-weight-bold font-12 text-danger mb-1">{{ $unsafeImg->title ?? 'Counterfeit Copy' }}</h6>
                                @if($unsafeImg->highlight_points)
                                    <small class="text-danger d-block font-11 font-weight-bold"><i class="fa fa-exclamation"></i> {{ $unsafeImg->highlight_points }}</small>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4 text-muted">
                            <i class="fa fa-shield-alt fa-2x mb-2 d-block text-success"></i>
                            No counterfeit alerts or fake images reported for this medicine.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Specs Table -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-light">
        <h5 class="mb-0 font-weight-bold text-dark"><i class="fa fa-list-alt mr-2"></i> Clinical &amp; Pharmaceutical Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="font-weight-bold text-muted font-12">INDICATIONS &amp; USES</label>
                <p class="text-dark">{{ $medicine->indications ?? 'Not specified' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="font-weight-bold text-muted font-12">DOSAGE &amp; ADMINISTRATION</label>
                <p class="text-dark">{{ $medicine->dosage_guidelines ?? 'Not specified' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="font-weight-bold text-muted font-12">PRECAUTIONS &amp; SIDE EFFECTS</label>
                <p class="text-dark">{{ $medicine->side_effects ?? 'Not specified' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="font-weight-bold text-muted font-12">STORAGE CONDITIONS</label>
                <p class="text-dark">{{ $medicine->storage_condition ?? 'Store in a cool and dry place.' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
