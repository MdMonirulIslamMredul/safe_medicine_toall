@extends('admin.master')

@section('title', ' - Medicines Management')

@section('body')
<div class="row page-titles">
    <div class="col-md-6 align-self-center">
        <h4 class="text-dark font-weight-bold mb-1"><i class="fa fa-pills text-primary mr-2"></i> Medicine Safety Database</h4>
        <p class="text-muted small mb-0">Manage verified safe medicines, counterfeit alerts, and recall notices</p>
    </div>
    <div class="col-md-6 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Medicines</li>
            </ol>
            <a href="{{ route('admin.medicines.create') }}" class="btn btn-primary d-none d-lg-block ml-3 font-weight-bold shadow-sm">
                <i class="fa fa-plus-circle mr-1"></i> Add New Medicine
            </a>
        </div>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="fa fa-check-circle mr-2"></i> {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- Metric Summary Cards -->
<div class="row mb-3">
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card border shadow-sm h-100">
            <div class="card-body p-3">
                <div class="d-flex align-items-center">
                    <div class="round round-primary mr-3"><i class="fa fa-medkit text-white"></i></div>
                    <div>
                        <h3 class="mb-0 font-weight-bold text-dark">{{ $counts['all'] }}</h3>
                        <span class="text-muted small">Total Medicines</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card border shadow-sm h-100">
            <div class="card-body p-3">
                <div class="d-flex align-items-center">
                    <div class="round round-success mr-3"><i class="fa fa-check-circle text-white"></i></div>
                    <div>
                        <h3 class="mb-0 font-weight-bold text-success">{{ $counts['safe'] }}</h3>
                        <span class="text-muted small">Authentic &amp; Safe</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card border shadow-sm h-100">
            <div class="card-body p-3">
                <div class="d-flex align-items-center">
                    <div class="round round-danger mr-3"><i class="fa fa-exclamation-triangle text-white"></i></div>
                    <div>
                        <h3 class="mb-0 font-weight-bold text-danger">{{ $counts['unsafe'] }}</h3>
                        <span class="text-muted small">Fake / Counterfeit Alerts</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card border shadow-sm h-100">
            <div class="card-body p-3">
                <div class="d-flex align-items-center">
                    <div class="round round-warning mr-3"><i class="fa fa-exclamation-circle text-dark"></i></div>
                    <div>
                        <h3 class="mb-0 font-weight-bold text-warning">{{ $counts['warning'] }}</h3>
                        <span class="text-muted small">Quality Recalls / Caution</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Table Card -->
<div class="card border shadow-sm rounded-4">
    <div class="card-body p-4">
        <!-- Search and Filter Toolbar -->
        <form method="GET" action="{{ route('admin.medicines.index') }}" class="mb-4">
            <div class="row align-items-center g-2">
                <div class="col-md-4 mb-2 mb-md-0">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search Brand, Generic, DAR No, Company..." value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Search</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-2 mb-md-0">
                    <select name="status" class="form-control" onchange="this.form.submit()">
                        <option value="">-- All Safety Statuses --</option>
                        <option value="safe" {{ request('status') == 'safe' ? 'selected' : '' }}>✓ Authentic &amp; Safe</option>
                        <option value="unsafe" {{ request('status') == 'unsafe' ? 'selected' : '' }}>⚠️ Counterfeit / Fake Alert</option>
                        <option value="warning" {{ request('status') == 'warning' ? 'selected' : '' }}>⚡ Recalled / Warning</option>
                    </select>
                </div>
                <div class="col-md-3 mb-2 mb-md-0">
                    <select name="dosage_form" class="form-control" onchange="this.form.submit()">
                        <option value="">-- All Dosage Forms --</option>
                        <option value="Tablet" {{ request('dosage_form') == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                        <option value="Capsule" {{ request('dosage_form') == 'Capsule' ? 'selected' : '' }}>Capsule</option>
                        <option value="Syrup" {{ request('dosage_form') == 'Syrup' ? 'selected' : '' }}>Syrup</option>
                        <option value="Suspension" {{ request('dosage_form') == 'Suspension' ? 'selected' : '' }}>Suspension</option>
                        <option value="Injection" {{ request('dosage_form') == 'Injection' ? 'selected' : '' }}>Injection</option>
                        <option value="Eye Drop" {{ request('dosage_form') == 'Eye Drop' ? 'selected' : '' }}>Eye Drop</option>
                        <option value="Ointment" {{ request('dosage_form') == 'Ointment' ? 'selected' : '' }}>Ointment</option>
                    </select>
                </div>
                <div class="col-md-2 text-md-right">
                    @if(request()->hasAny(['search', 'status', 'dosage_form']))
                        <a href="{{ route('admin.medicines.index') }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-times mr-1"></i> Reset</a>
                    @endif
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="thead-light">
                    <tr>
                        <th width="50" class="text-center">#</th>
                        <th width="80" class="text-center">Preview</th>
                        <th>Medicine &amp; Generic Info</th>
                        <th>Manufacturer &amp; DAR No.</th>
                        <th>Form &amp; Strength</th>
                        <th>Price (BDT)</th>
                        <th class="text-center">Images</th>
                        <th class="text-center">Safety Status</th>
                        <th width="140" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($medicines as $key => $medicine)
                    @php
                        $safeCount = $medicine->safeImages->count();
                        $unsafeCount = $medicine->unsafeImages->count();
                    @endphp
                    <tr>
                        <td class="text-center font-weight-bold text-muted">{{ $medicines->firstItem() + $key }}</td>
                        <td class="text-center">
                            <img src="{{ $medicine->cover_image_url }}" alt="{{ $medicine->name }}" class="rounded border shadow-sm" style="width: 56px; height: 46px; object-fit: contain; background: #fff;">
                        </td>
                        <td>
                            <div class="font-weight-bold text-dark font-15 mb-1">{{ $medicine->name }}</div>
                            <div class="text-muted font-12"><i class="fa fa-dna text-primary mr-1"></i> {{ $medicine->generic_name }}</div>
                            @if($medicine->therapeutic_class)
                                <span class="badge badge-soft-secondary mt-1 font-11">{{ $medicine->therapeutic_class }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="font-weight-bold text-dark font-13"><i class="fa fa-building text-secondary mr-1"></i> {{ $medicine->manufacturer }}</div>
                            <small class="text-muted font-11">DAR: <span class="font-weight-bold text-dark">{{ $medicine->dar_number ?? 'N/A' }}</span></small>
                        </td>
                        <td>
                            <span class="badge badge-soft-info">{{ $medicine->dosage_form }}</span>
                            <div class="text-dark font-12 font-weight-bold mt-1">{{ $medicine->strength ?? '-' }}</div>
                        </td>
                        <td class="font-weight-bold text-dark font-14">
                            {{ $medicine->price ? '৳ ' . number_format($medicine->price, 2) : '-' }}
                        </td>
                        <td class="text-center">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <span class="badge badge-soft-success mb-1" title="Safe / Authentic Images">
                                    <i class="fa fa-shield-alt mr-1"></i> {{ $safeCount }} Safe
                                </span>
                                @if($unsafeCount > 0)
                                    <span class="badge badge-soft-danger" title="Counterfeit / Fake Drug Images">
                                        <i class="fa fa-exclamation-triangle mr-1"></i> {{ $unsafeCount }} Fake
                                    </span>
                                @else
                                    <span class="badge badge-soft-secondary text-muted font-11">
                                        <i class="fa fa-check mr-1"></i> 0 Fake
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="text-center">
                            @if($medicine->status == 'safe')
                                <span class="badge badge-soft-success font-12 px-3 py-1">
                                    <i class="fa fa-check-circle mr-1"></i> Authentic &amp; Safe
                                </span>
                            @elseif($medicine->status == 'unsafe')
                                <span class="badge badge-soft-danger font-12 px-3 py-1">
                                    <i class="fa fa-exclamation-triangle mr-1"></i> Counterfeit / Fake
                                </span>
                            @else
                                <span class="badge badge-soft-warning font-12 px-3 py-1">
                                    <i class="fa fa-exclamation-circle mr-1"></i> Quality Recall
                                </span>
                            @endif

                            @if($medicine->affected_batches)
                                <div class="text-danger font-11 mt-1 font-weight-bold" title="{{ $medicine->affected_batches }}">
                                    <i class="fa fa-tag mr-1"></i> Flagged Batch
                                </div>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group shadow-sm rounded" role="group">
                                <a href="{{ route('admin.medicines.show', $medicine->id) }}" class="btn btn-sm btn-outline-info" title="View Details">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.medicines.edit', $medicine->id) }}" class="btn btn-sm btn-outline-primary" title="Edit Medicine & Images">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.medicines.destroy', $medicine->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this medicine and all its attached images?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-5">
                            <i class="fa fa-box-open fa-3x text-muted mb-3 d-block"></i>
                            <h5 class="text-muted">No medicines found matching your criteria.</h5>
                            <a href="{{ route('admin.medicines.create') }}" class="btn btn-primary btn-sm mt-2">
                                <i class="fa fa-plus-circle mr-1"></i> Add First Medicine
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="text-muted font-12">
                Showing {{ $medicines->firstItem() ?? 0 }} to {{ $medicines->lastItem() ?? 0 }} of {{ $medicines->total() }} records
            </div>
            <div>
                {{ $medicines->links() }}
            </div>
        </div>
    </div>
</div>

<style>
.font-11 { font-size: 11px !important; }
.font-12 { font-size: 12px !important; }
.font-13 { font-size: 13px !important; }
.font-14 { font-size: 14px !important; }
.font-15 { font-size: 15px !important; }
.font-16 { font-size: 16px !important; }
.round {
    line-height: 48px;
    color: #ffffff;
    width: 48px;
    height: 48px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 400;
    text-align: center;
    border-radius: 12px;
}
.round.round-primary { background: linear-gradient(135deg, #2563eb, #3b82f6); box-shadow: 0 4px 10px rgba(37,99,235,0.2); }
.round.round-success { background: linear-gradient(135deg, #059669, #10b981); box-shadow: 0 4px 10px rgba(16,185,129,0.2); }
.round.round-danger  { background: linear-gradient(135deg, #dc2626, #ef4444); box-shadow: 0 4px 10px rgba(239,68,68,0.2); }
.round.round-warning { background: linear-gradient(135deg, #d97706, #f59e0b); box-shadow: 0 4px 10px rgba(245,158,11,0.2); }

.table thead th {
    background: #f8fafc;
    color: #475569;
    font-weight: 700;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 1px solid #e2e8f0;
    padding: 12px 14px;
}
.table tbody td {
    padding: 14px;
    vertical-align: middle;
    border-color: #f1f5f9;
}
</style>
@endsection
