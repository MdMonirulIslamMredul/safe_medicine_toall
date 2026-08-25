@extends('frontend.master')

@push('frontend_style')
<style>
    /* ── Page-level variables ── */
    :root {
        --green:      #008E48;
        --green-dark: #006633;
        --green-pale: #e8f7ee;
        --red-soft:   #fff0f0;
        --red-border: #f5c6cb;
        --radius:     10px;
    }

    /* ── Banner ── */
    .umr-banner {
        background: linear-gradient(135deg, var(--green-dark) 0%, var(--green) 100%);
        padding: 60px 0 50px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .umr-banner::before {
        content: '';
        position: absolute; inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .umr-banner h1 { color: #fff; font-size: 2rem; font-weight: 700; margin-bottom: 8px; position: relative; }
    .umr-banner p  { color: rgba(255,255,255,.82); font-size: 1.05rem; margin: 0; position: relative; }
    .umr-breadcrumb { list-style: none; padding: 0; margin: 14px 0 0; display: flex; justify-content: center; gap: 6px; position: relative; }
    .umr-breadcrumb li { color: rgba(255,255,255,.7); font-size: .9rem; }
    .umr-breadcrumb li a { color: rgba(255,255,255,.9); text-decoration: none; }
    .umr-breadcrumb li + li::before { content: '/'; margin-right: 6px; }

    /* ── Layout ── */
    .umr-wrapper { padding: 60px 0 80px; background: #f7faf8; }

    /* ── Filters & Search ── */
    .umr-filter-card {
        background: #fff;
        border-radius: var(--radius);
        padding: 24px;
        box-shadow: 0 4px 20px rgba(0,142,72,.06);
        margin-bottom: 30px;
    }

    .umr-status-nav {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 20px;
        border-bottom: 1px solid #e1e8e4;
        padding-bottom: 15px;
    }

    .umr-status-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 0.88rem;
        font-weight: 600;
        color: #555;
        background: #f1f5f2;
        border: 1px solid transparent;
        text-decoration: none !important;
        transition: all 0.2s ease;
    }

    .umr-status-btn:hover {
        background: #e2eae5;
        color: var(--green-dark);
    }

    .umr-status-btn.active {
        background: var(--green);
        color: #fff;
        box-shadow: 0 4px 10px rgba(0,142,72,0.2);
    }

    .umr-status-btn .badge {
        background: rgba(0,0,0,0.1);
        color: inherit;
        border-radius: 20px;
        padding: 3px 8px;
        font-size: 0.75rem;
    }

    .umr-status-btn.active .badge {
        background: rgba(255,255,255,0.25);
    }

    /* ── Table & Cards ── */
    .umr-table-card {
        background: #fff;
        border-radius: var(--radius);
        box-shadow: 0 4px 20px rgba(0,142,72,.06);
        overflow: hidden;
    }

    .table-responsive {
        border: none;
    }

    .umr-table {
        margin-bottom: 0;
    }

    .umr-table thead {
        background: var(--green-dark);
        color: #fff;
    }

    .umr-table thead th {
        border: none;
        padding: 15px 18px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .umr-table tbody td {
        padding: 16px 18px;
        vertical-align: middle;
        border-top: 1px solid #edf2ef;
    }

    .umr-table tbody tr:hover {
        background-color: #fafdfa;
    }

    /* ── Tracking code style ── */
    .tracking-code {
        font-family: monospace;
        background: var(--green-pale);
        color: var(--green-dark);
        padding: 4px 10px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 0.05em;
        border: 1px solid #c2e7d3;
    }

    /* ── Status Badges ── */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: capitalize;
    }

    .status-badge.pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-badge.investigating {
        background: #cff4fc;
        color: #0c5460;
    }

    .status-badge.resolved {
        background: #d1e7dd;
        color: #0f5132;
    }

    .status-badge.rejected {
        background: #f8d7da;
        color: #721c24;
    }

    .blacklist-badge {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
    }

    /* ── View Detail Link Button ── */
    .view-detail-btn {
        background: var(--green-pale);
        color: var(--green);
        border: 1px solid #c2e7d3;
        padding: 6px 14px;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 600;
        text-decoration: none !important;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .view-detail-btn:hover {
        background: var(--green);
        color: #fff !important;
        border-color: var(--green);
    }

    /* ── Search inputs ── */
    .search-input-group {
        display: flex;
        border: 1px solid #d0e8db;
        border-radius: 6px;
        overflow: hidden;
        background: #fff;
    }

    .search-input-group input {
        border: none !important;
        box-shadow: none !important;
        padding: 10px 15px;
        flex: 1;
        font-size: 0.9rem;
    }

    .search-input-group .btn {
        background: var(--green);
        color: #fff;
        border: none;
        border-radius: 0;
        padding: 0 20px;
        transition: background 0.2s;
    }

    .search-input-group .btn:hover {
        background: var(--green-dark);
    }

    /* Pagination design styling */
    .pagination {
        margin: 25px 0 0;
        display: flex;
        justify-content: center;
        list-style: none;
        padding-left: 0;
        border-radius: 4px;
    }

    .pagination li {
        margin: 0 3px;
    }

    .pagination li a, .pagination li span {
        color: var(--green);
        padding: 8px 14px;
        background: #fff;
        border: 1px solid #d0e8db;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s;
    }

    .pagination li.active span, .pagination li a:hover {
        background: var(--green);
        color: #fff !important;
        border-color: var(--green);
    }

    .pagination li.disabled span {
        color: #999;
        background: #f8fcf9;
        border-color: #e2ede7;
        cursor: not-allowed;
    }


</style>
@endpush

@section('title')
    @if(session()->get('language') == 'bangla') মেডিসিন রিপোর্ট তালিকা @else Medicine Reports List @endif
@endsection

@section('content')

{{-- ═══════════════════════════════════════════════════════════ BANNER ══ --}}
<div class="umr-banner">
    <div class="container">
        <h1>
            @if(session()->get('language') == 'bangla')
                জমা দেওয়া রিপোর্টসমূহ
            @else
                Submitted Reports
            @endif
        </h1>
        <p>
            @if(session()->get('language') == 'bangla')
                আমাদের সিস্টেমে জমা হওয়া অনিরাপদ ও নকল ওষুধের রিপোর্টের অবস্থা দেখুন।
            @else
                Track the status of counterfeit &amp; substandard medicine reports in our system.
            @endif
        </p>
        <ul class="umr-breadcrumb">
            <li><a href="{{ route('front.page') }}">
                @if(session()->get('language') == 'bangla') হোম @else Home @endif
            </a></li>
            <li>@if(session()->get('language') == 'bangla') রিপোর্ট তালিকা @else Reports List @endif</li>
        </ul>
    </div>
</div>

{{-- ════════════════════════════════════════════════════════════ BODY ══ --}}
<div class="umr-wrapper">
    <div class="container">

        {{-- ─── FILTERS & SEARCH CARD ─── --}}
        <div class="umr-filter-card">
            <div class="row" style="align-items: center;">

                {{-- Status filters --}}
                <div class="col-lg-8" style="margin-bottom: 15px;">
                    <div class="umr-status-nav">
                        {{-- All --}}
                        <a href="{{ route('unsafe.medicine.reports.index', array_merge(request()->except('status', 'page'), [])) }}"
                           class="umr-status-btn {{ !request('status') ? 'active' : '' }}">
                            <span>@if(session()->get('language') == 'bangla') সর্বমোট @else All @endif</span>
                            <span class="badge">{{ $counts['all'] }}</span>
                        </a>

                        {{-- Pending --}}
                        <a href="{{ route('unsafe.medicine.reports.index', array_merge(request()->except('status', 'page'), ['status' => 'pending'])) }}"
                           class="umr-status-btn {{ request('status') == 'pending' ? 'active' : '' }}">
                            <span>@if(session()->get('language') == 'bangla') পেন্ডিং @else Pending @endif</span>
                            <span class="badge">{{ $counts['pending'] }}</span>
                        </a>

                        {{-- Investigating --}}
                        <a href="{{ route('unsafe.medicine.reports.index', array_merge(request()->except('status', 'page'), ['status' => 'investigating'])) }}"
                           class="umr-status-btn {{ request('status') == 'investigating' ? 'active' : '' }}">
                            <span>@if(session()->get('language') == 'bangla') তদন্তাধীন @else Investigating @endif</span>
                            <span class="badge">{{ $counts['investigating'] }}</span>
                        </a>

                        {{-- Resolved --}}
                        <a href="{{ route('unsafe.medicine.reports.index', array_merge(request()->except('status', 'page'), ['status' => 'resolved'])) }}"
                           class="umr-status-btn {{ request('status') == 'resolved' ? 'active' : '' }}">
                            <span>@if(session()->get('language') == 'bangla') সমাধানকৃত @else Resolved @endif</span>
                            <span class="badge">{{ $counts['resolved'] }}</span>
                        </a>

                        {{-- Rejected --}}
                        <a href="{{ route('unsafe.medicine.reports.index', array_merge(request()->except('status', 'page'), ['status' => 'rejected'])) }}"
                           class="umr-status-btn {{ request('status') == 'rejected' ? 'active' : '' }}">
                            <span>@if(session()->get('language') == 'bangla') প্রত্যাখ্যাত @else Rejected @endif</span>
                            <span class="badge">{{ $counts['rejected'] }}</span>
                        </a>
                    </div>
                </div>

                {{-- Search Bar --}}
                <div class="col-lg-4" style="margin-bottom: 15px;">
                    <form action="{{ route('unsafe.medicine.reports.index') }}" method="GET">
                        @if(request('status'))
                            <input type="hidden" name="status" value="{{ request('status') }}">
                        @endif
                        <div class="search-input-group">
                            <input type="text" name="search" value="{{ request('search') }}"
                                   placeholder="@if(session()->get('language') == 'bangla') ট্র্যাকিং কোড বা ওষুধের নাম দিয়ে খুঁজুন @else Search Tracking No, Medicine... @endif">
                            <button type="submit" class="btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        @if(request('search'))
                            <div style="text-align: right; margin-top: 6px;">
                                <a href="{{ route('unsafe.medicine.reports.index', request()->except('search', 'page')) }}" style="font-size:0.8rem; color: #cc2a2a; text-decoration: underline;">
                                    @if(session()->get('language') == 'bangla') অনুসন্ধান মুছুন @else Clear Search @endif
                                </a>
                            </div>
                        @endif
                    </form>
                </div>

            </div>
        </div>

        {{-- ─── REPORTS LIST TABLE ─── --}}
        <div class="umr-table-card">
            <div class="table-responsive">
                <table class="table umr-table align-middle">
                    <thead>
                        <tr>
                            <th style="width: 140px;">@if(session()->get('language') == 'bangla') ট্র্যাকিং নম্বর @else Tracking No. @endif</th>
                            <th>@if(session()->get('language') == 'bangla') ওষধের নাম / ব্যাচ @else Medicine / Batch @endif</th>
                            <th>@if(session()->get('language') == 'bangla') ফার্মেসি @else Pharmacy @endif</th>
                            <th>@if(session()->get('language') == 'bangla') জেলা @else District @endif</th>
                            <th style="text-align: center;">@if(session()->get('language') == 'bangla') অবস্থা @else Status @endif</th>
                            <th style="text-align: center; width: 100px;">@if(session()->get('language') == 'bangla') কালো তালিকা @else Blacklisted @endif</th>
                            <th style="width: 110px;">@if(session()->get('language') == 'bangla') তারিখ @else Submitted @endif</th>
                            <th style="text-align: center; width: 130px;">@if(session()->get('language') == 'bangla') অ্যাকশন @else Action @endif</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reports as $report)
                            @php
                                $badgeClass = $report->status;
                            @endphp
                            {{-- MAIN ROW --}}
                            <tr>
                                <td>
                                    <span class="tracking-code">{{ $report->tracking_number }}</span>
                                </td>
                                <td>
                                    <strong style="color: #333;">{{ $report->medicine_name }}</strong>
                                    @if($report->batch_number)
                                        <div style="font-size: 0.8rem; color: #666; margin-top: 2px;">
                                            @if(session()->get('language') == 'bangla') ব্যাচ: @else Batch: @endif {{ $report->batch_number }}
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $report->pharmacy_name }}</td>
                                <td>{{ $report->district }}</td>
                                <td style="text-align: center;">
                                    <span class="status-badge {{ $badgeClass }}">
                                        @if(session()->get('language') == 'bangla')
                                            @if($report->status == 'pending') পেন্ডিং
                                            @elseif($report->status == 'investigating') তদন্তাধীন
                                            @elseif($report->status == 'resolved') সমাধানকৃত
                                            @elseif($report->status == 'rejected') প্রত্যাখ্যাত
                                            @endif
                                        @else
                                            {{ $report->status }}
                                        @endif
                                    </span>
                                </td>
                                <td style="text-align: center;">
                                    @if($report->is_blacklisted)
                                        <span class="blacklist-badge">
                                            <i class="fa fa-ban" style="margin-right: 3px;"></i> Yes
                                        </span>
                                    @else
                                        <span style="color: #bbb;">—</span>
                                    @endif
                                </td>
                                <td style="font-size: 0.85rem; color: #666;">
                                    {{ $report->created_at->format('d M Y') }}
                                </td>
                                <td style="text-align: center;">
                                    <a href="{{ route('unsafe.medicine.reports.show', $report->id) }}"
                                       class="view-detail-btn">
                                        <i class="fa fa-eye"></i>
                                        <span>@if(session()->get('language') == 'bangla') বিস্তারিত @else Details @endif</span>
                                    </a>
                                </td>
                            </tr>


                        @empty
                            <tr>
                                <td colspan="8" style="padding: 40px; text-align: center;">
                                    <div style="font-size: 2.2rem; color: #a8d8bc; margin-bottom: 12px;">
                                        <i class="fa fa-folder-open-o"></i>
                                    </div>
                                    <h4 style="color: #666; margin-bottom: 5px;">
                                        @if(session()->get('language') == 'bangla') কোনো রিপোর্ট পাওয়া যায়নি @else No Reports Found @endif
                                    </h4>
                                    <p class="text-muted" style="font-size: 0.9rem;">
                                        @if(session()->get('language') == 'bangla') আপনার দেওয়া ফিল্টার বা অনুসন্ধান শব্দটির জন্য কোনো অভিযোগের রিপোর্ট মেলেনি। @else We couldn't find any reports matching your filter or search criteria. @endif
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            @if($reports->hasPages())
                <div style="padding: 20px 18px; background: #fafdfa; border-top: 1px solid #edf2ef;">
                    {{ $reports->links() }}
                </div>
            @endif

        </div>

    </div>
</div>

@endsection
