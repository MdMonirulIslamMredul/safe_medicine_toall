@extends('admin.master')
@section('title') | Report {{ $report->tracking_number }} @endsection

@section('body')

{{-- ══════════════════════════════════════════════════════════
     BREADCRUMB / PAGE HEADER
══════════════════════════════════════════════════════════════ --}}
<div class="d-flex align-items-center justify-content-between mt-3 mb-3 flex-wrap" style="gap:10px;">
    <div>
        {{-- Breadcrumb --}}
        <nav style="font-size:.83rem; color:#888; margin-bottom:4px;">
            <a href="{{ route('admin.medicine.reports') }}" style="color:#888; text-decoration:none;">
                <i class="fa fa-medkit me-1"></i> Medicine Reports
            </a>
            <span class="mx-2">/</span>
            <span style="color:#333; font-weight:600;">{{ $report->tracking_number }}</span>
        </nav>
        <h5 class="mb-0 fw-bold" style="color:#1a1a2e;">Report Detail</h5>
    </div>

    <a href="{{ route('admin.medicine.reports') }}"
       class="btn btn-sm btn-outline-secondary">
        <i class="fa fa-arrow-left me-1"></i> Back to List
    </a>
</div>

{{-- Flash success message --}}
@if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle me-2"></i> {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- ══════════════════════════════════════════════════════════
     TRACKING NUMBER HEADER STRIP
══════════════════════════════════════════════════════════════ --}}
<div class="card border-0 shadow-sm mb-3"
     style="background:linear-gradient(135deg,#1a1a2e 0%,#16213e 100%); color:#fff; border-radius:10px;">
    <div class="card-body d-flex align-items-center justify-content-between flex-wrap py-3" style="gap:12px;">
        <div class="d-flex align-items-center gap-3">
            <div style="width:50px;height:50px;border-radius:12px;background:rgba(126,255,192,.12);
                        display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <i class="fa fa-file-text-o" style="color:#7effc0;font-size:1.3rem;"></i>
            </div>
            <div>
                <div style="font-size:.72rem;color:rgba(255,255,255,.55);text-transform:uppercase;
                            letter-spacing:.08em;font-weight:600;">Tracking Number</div>
                <div style="font-family:monospace;font-size:1.25rem;font-weight:800;
                            letter-spacing:.08em;color:#7effc0;">
                    {{ $report->tracking_number }}
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center gap-3">
            @php
                $badgeMap = [
                    'pending'       => ['bg'=>'#fff3cd','color'=>'#856404','icon'=>'fa-clock-o'],
                    'investigating' => ['bg'=>'#cff4fc','color'=>'#0a9ab5','icon'=>'fa-search'],
                    'resolved'      => ['bg'=>'#d1e7dd','color'=>'#0f5132','icon'=>'fa-check-circle'],
                    'rejected'      => ['bg'=>'#f8d7da','color'=>'#842029','icon'=>'fa-times-circle'],
                ];
                $b = $badgeMap[$report->status] ?? ['bg'=>'#eee','color'=>'#555','icon'=>'fa-circle'];
            @endphp
            <span style="display:inline-flex;align-items:center;gap:6px;padding:6px 16px;
                         border-radius:20px;font-size:.85rem;font-weight:700;
                         background:{{ $b['bg'] }};color:{{ $b['color'] }};">
                <i class="fa {{ $b['icon'] }}"></i> {{ ucfirst($report->status) }}
            </span>
            @if($report->is_blacklisted)
                <span style="display:inline-flex;align-items:center;gap:6px;padding:6px 14px;
                             border-radius:20px;font-size:.85rem;font-weight:700;
                             background:#f8d7da;color:#842029;">
                    <i class="fa fa-ban"></i> Blacklisted
                </span>
            @endif
            <small style="color:rgba(255,255,255,.45); font-size:.78rem;">
                Submitted {{ $report->created_at->format('d M Y') }}
            </small>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════
     TWO-COLUMN LAYOUT
     col-lg-8  →  Detail cards
     col-lg-4  →  Status update sidebar
══════════════════════════════════════════════════════════════ --}}
<div class="row g-3" style="align-items:flex-start;">

    {{-- ─────────────────────────────────────────────────────
         LEFT COLUMN — REPORT DETAILS
    ───────────────────────────────────────────────────────── --}}
    <div class="col-lg-8">

        {{-- Reporter & Medicine side by side --}}
        <div class="row g-3 mb-3">

            {{-- Reporter Info --}}
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header fw-bold"
                         style="background:#e8f7ee;color:#006633;font-size:.88rem;border:none;">
                        <i class="fa fa-user me-2"></i> Reporter Info
                    </div>
                    <div class="card-body py-2">
                        <table class="table table-sm table-borderless mb-0">
                            <tr>
                                <td class="text-muted" style="width:38%;font-size:.82rem;font-weight:600;vertical-align:top;">Name</td>
                                <td style="font-size:.88rem;">
                                    @if($report->reporter_name)
                                        {{ $report->reporter_name }}
                                    @else
                                        <em class="text-muted">Anonymous</em>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-muted" style="font-size:.82rem;font-weight:600;">Phone</td>
                                <td style="font-size:.88rem;">{{ $report->reporter_phone ?? '—' }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted" style="font-size:.82rem;font-weight:600;">Submitted</td>
                                <td style="font-size:.88rem;">{{ $report->created_at->format('d M Y, h:i A') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Medicine Info --}}
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header fw-bold"
                         style="background:#fff3e0;color:#e65100;font-size:.88rem;border:none;">
                        <i class="fa fa-medkit me-2"></i> Medicine Info
                    </div>
                    <div class="card-body py-2">
                        <table class="table table-sm table-borderless mb-0">
                            <tr>
                                <td class="text-muted" style="width:38%;font-size:.82rem;font-weight:600;">Name</td>
                                <td style="font-size:.88rem;font-weight:600;">{{ $report->medicine_name }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted" style="font-size:.82rem;font-weight:600;">Batch No.</td>
                                <td style="font-size:.88rem;">{{ $report->batch_number ?? '—' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pharmacy Info --}}
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header fw-bold"
                 style="background:#fce4ec;color:#880e4f;font-size:.88rem;border:none;">
                <i class="fa fa-hospital-o me-2"></i> Pharmacy Info
            </div>
            <div class="card-body py-2">
                <table class="table table-sm table-borderless mb-0">
                    <tr>
                        <td class="text-muted" style="width:22%;font-size:.82rem;font-weight:600;">Pharmacy Name</td>
                        <td style="font-size:.88rem;font-weight:600;">{{ $report->pharmacy_name }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted" style="font-size:.82rem;font-weight:600;">District</td>
                        <td style="font-size:.88rem;">{{ $report->district }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted" style="font-size:.82rem;font-weight:600;vertical-align:top;">Address</td>
                        <td style="font-size:.88rem;">{{ $report->pharmacy_address }}</td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- Issue Description --}}
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header fw-bold"
                 style="background:#f3f4f6;color:#333;font-size:.88rem;border:none;">
                <i class="fa fa-file-text-o me-2"></i> Issue Description
            </div>
            <div class="card-body">
                <p class="mb-0"
                   style="white-space:pre-wrap; line-height:1.9; font-size:.9rem; color:#444;">{{ $report->description }}</p>
            </div>
        </div>

        {{-- Evidence Images --}}
        @if($report->images && count($report->images) > 0)
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header fw-bold"
                 style="background:#f3f4f6;color:#333;font-size:.88rem;border:none;">
                <i class="fa fa-camera me-2"></i>
                Evidence Images
                <span class="badge bg-secondary ms-1" style="font-size:.72rem;">{{ count($report->images) }}</span>
            </div>
            <div class="card-body">
                <div style="display:flex; flex-wrap:wrap; gap:12px;">
                    @foreach($report->images as $img)
                    <a href="{{ asset($img) }}" target="_blank"
                       style="display:block; width:130px; height:130px; border-radius:8px;
                              overflow:hidden; border:2px solid #d4ede3; flex-shrink:0;
                              transition:transform .18s, box-shadow .18s;"
                       onmouseover="this.style.transform='scale(1.05)';this.style.boxShadow='0 6px 20px rgba(0,0,0,.15)'"
                       onmouseout="this.style.transform='';this.style.boxShadow=''">
                        <img src="{{ asset($img) }}" alt="Evidence"
                             style="width:100%; height:100%; object-fit:cover;"
                             onerror="this.src='https://placehold.co/130x130?text=Image'">
                    </a>
                    @endforeach
                </div>
                <small class="text-muted mt-2 d-block">
                    <i class="fa fa-info-circle me-1"></i>
                    Click any image to open full-size in a new tab.
                </small>
            </div>
        </div>
        @endif

        {{-- YouTube Video Evidence --}}
        @if($report->video)
            @php
                preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w\-]{11})/', $report->video, $ytm);
                $videoId = $ytm[1] ?? null;
            @endphp
            @if($videoId)
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-header fw-bold"
                     style="background:#f3f4f6;color:#333;font-size:.88rem;border:none;">
                    <i class="fa fa-youtube-play text-danger me-2"></i> Video Evidence
                </div>
                <div class="card-body p-0" style="position:relative; padding-top:56.25% !important; overflow:hidden;">
                    <iframe src="https://www.youtube.com/embed/{{ $videoId }}"
                            style="position:absolute; top:0; left:0; width:100%; height:100%; border:none;"
                            allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            @endif
        @endif

    </div>{{-- /col-lg-8 --}}

    {{-- ─────────────────────────────────────────────────────
         RIGHT COLUMN — STATUS SIDEBAR
    ───────────────────────────────────────────────────────── --}}
    <div class="col-lg-4">
        <div style="position:sticky; top:80px;">

            {{-- Current status snapshot --}}
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-header fw-bold"
                     style="background:#e8eaf6;color:#1a237e;font-size:.88rem;border:none;">
                    <i class="fa fa-flag me-2"></i> Current Status
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <span style="display:inline-flex;align-items:center;gap:6px;padding:7px 18px;
                                     border-radius:20px;font-size:.9rem;font-weight:700;
                                     background:{{ $b['bg'] }};color:{{ $b['color'] }};">
                            <i class="fa {{ $b['icon'] }}"></i> {{ ucfirst($report->status) }}
                        </span>
                        @if($report->is_blacklisted)
                            <span style="display:inline-flex;align-items:center;gap:5px;padding:7px 14px;
                                         border-radius:20px;font-size:.85rem;font-weight:700;
                                         background:#f8d7da;color:#842029;">
                                <i class="fa fa-ban"></i> Blacklisted
                            </span>
                        @endif
                    </div>
                    <table class="table table-sm table-borderless mb-0">
                        <tr>
                            <td class="text-muted" style="font-size:.8rem;font-weight:600;width:45%;">Last updated</td>
                            <td style="font-size:.82rem;">{{ $report->updated_at->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted" style="font-size:.8rem;font-weight:600;">Time</td>
                            <td style="font-size:.82rem;">{{ $report->updated_at->format('h:i A') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            {{-- ── Update Status Form ── --}}
            <div class="card border-0 shadow-sm">
                <div class="card-header fw-bold"
                     style="background:#1a1a2e;color:#fff;font-size:.88rem;border:none;border-radius:8px 8px 0 0;">
                    <i class="fa fa-pencil me-2"></i> Update Status
                </div>
                <div class="card-body" style="background:#fafbfc;">

                    <form method="POST"
                          action="{{ route('admin.medicine.reports.status', $report->id) }}">
                        @csrf
                        @method('PATCH')

                        {{-- Status --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold mb-1" style="font-size:.83rem;">
                                <i class="fa fa-flag me-1 text-primary"></i> Report Status
                            </label>
                            <select name="status" class="form-control form-select" required
                                    style="border-radius:6px; border-color:#dee2e6;">
                                <option value="pending"
                                    {{ $report->status == 'pending' ? 'selected' : '' }}>
                                    ⏳ Pending
                                </option>
                                <option value="investigating"
                                    {{ $report->status == 'investigating' ? 'selected' : '' }}>
                                    🔍 Investigating
                                </option>
                                <option value="resolved"
                                    {{ $report->status == 'resolved' ? 'selected' : '' }}>
                                    ✅ Resolved
                                </option>
                                <option value="rejected"
                                    {{ $report->status == 'rejected' ? 'selected' : '' }}>
                                    ❌ Rejected
                                </option>
                            </select>
                        </div>

                        {{-- Blacklist --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold mb-2" style="font-size:.83rem;">
                                <i class="fa fa-ban me-1 text-danger"></i> Blacklist Pharmacy
                            </label>

                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                           name="is_blacklisted" value="1"
                                           id="bl_yes"
                                           {{ $report->is_blacklisted ? 'checked' : '' }}>
                                    <label class="form-check-label text-danger fw-semibold"
                                           for="bl_yes" style="font-size:.85rem;">
                                        <i class="fa fa-ban me-1"></i> Blacklist
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                           name="is_blacklisted" value="0"
                                           id="bl_no"
                                           {{ !$report->is_blacklisted ? 'checked' : '' }}>
                                    <label class="form-check-label" for="bl_no"
                                           style="font-size:.85rem;">Not Blacklisted</label>
                                </div>
                            </div>
                            <small class="text-muted d-block mt-1" style="font-size:.78rem;">
                                Blacklisting flags this pharmacy across all future reports.
                            </small>
                        </div>

                        <button type="submit"
                                class="btn btn-primary w-100 fw-semibold"
                                style="border-radius:6px; padding:10px;">
                            <i class="fa fa-save me-2"></i> Save Changes
                        </button>

                    </form>
                </div>
            </div>
            {{-- /update status card --}}

        </div>{{-- /sticky wrapper --}}
    </div>{{-- /col-lg-4 --}}

</div>{{-- /row --}}

@endsection
