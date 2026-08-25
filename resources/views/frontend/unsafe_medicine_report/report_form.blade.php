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
    .umr-wrapper  { padding: 60px 0 80px; background: #f7faf8; }
    .umr-info-panel {
        background: #fff;
        border-radius: var(--radius);
        padding: 36px 30px;
        box-shadow: 0 4px 20px rgba(0,142,72,.08);
        height: 100%;
    }
    .umr-form-panel {
        background: #fff;
        border-radius: var(--radius);
        padding: 36px 30px;
        box-shadow: 0 4px 20px rgba(0,142,72,.1);
    }

    /* ── Info panel ── */
    .umr-info-panel h3 {
        color: var(--green);
        font-size: 1.3rem;
        font-weight: 700;
        border-left: 4px solid var(--green);
        padding-left: 12px;
        margin-bottom: 20px;
    }
    .umr-step {
        display: flex;
        gap: 14px;
        align-items: flex-start;
        margin-bottom: 22px;
    }
    .umr-step-num {
        min-width: 36px; height: 36px;
        background: var(--green);
        color: #fff;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-weight: 700; font-size: .9rem;
        flex-shrink: 0;
    }
    .umr-step-body h5 { margin: 0 0 4px; font-size: .95rem; color: #333; font-weight: 600; }
    .umr-step-body p  { margin: 0; font-size: .85rem; color: #666; line-height: 1.5; }

    .umr-anon-badge {
        background: var(--green-pale);
        border: 1px solid #b2dfcc;
        border-radius: 8px;
        padding: 14px 16px;
        margin-top: 24px;
        display: flex; gap: 10px; align-items: flex-start;
    }
    .umr-anon-badge .icon { color: var(--green); font-size: 1.2rem; margin-top: 2px; }
    .umr-anon-badge p { margin: 0; font-size: .85rem; color: #2d6a4f; }

    .umr-warning-badge {
        background: #fff8e1;
        border: 1px solid #ffe082;
        border-radius: 8px;
        padding: 14px 16px;
        margin-top: 14px;
        display: flex; gap: 10px; align-items: flex-start;
    }
    .umr-warning-badge .icon { color: #f59f00; font-size: 1.2rem; margin-top: 2px; }
    .umr-warning-badge p { margin: 0; font-size: .85rem; color: #7a5c00; }

    /* ── Form ── */
    .umr-form-panel h3 {
        color: var(--green);
        font-size: 1.3rem;
        font-weight: 700;
        border-left: 4px solid var(--green);
        padding-left: 12px;
        margin-bottom: 6px;
    }
    .umr-form-panel .subtitle {
        color: #888; font-size: .85rem; margin-bottom: 26px; padding-left: 16px;
    }
    .umr-section-label {
        display: flex; align-items: center; gap: 8px;
        font-size: .78rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: .08em; color: var(--green);
        margin: 24px 0 14px;
    }
    .umr-section-label::after {
        content: ''; flex: 1; height: 1px; background: #d4ede3;
    }

    .form-group label { font-weight: 600; font-size: .88rem; color: #444; margin-bottom: 5px; }
    .form-group label .req { color: #e03131; margin-left: 2px; }
    .form-group label .opt { color: #aaa; font-weight: 400; font-size: .78rem; }
    .form-control {
        border-radius: 6px !important;
        border-color: #d0e8db !important;
        font-size: .9rem;
        transition: border-color .2s, box-shadow .2s;
    }
    .form-control:focus {
        border-color: var(--green) !important;
        box-shadow: 0 0 0 3px rgba(0,142,72,.12) !important;
        outline: none;
    }
    .form-control.is-invalid { border-color: #dc3545 !important; }
    .invalid-feedback { display: block; font-size: .8rem; color: #dc3545; margin-top: 4px; }

    /* ── Image upload zone ── */
    .umr-upload-zone {
        border: 2px dashed #a8d8bc;
        border-radius: 8px;
        padding: 28px 20px;
        text-align: center;
        cursor: pointer;
        transition: background .2s, border-color .2s;
        background: #f9fdf9;
        position: relative;
    }
    .umr-upload-zone:hover { background: var(--green-pale); border-color: var(--green); }
    .umr-upload-zone input[type="file"] {
        position: absolute; inset: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%;
    }
    .umr-upload-zone .upload-icon { font-size: 2rem; color: #a8d8bc; display: block; margin-bottom: 8px; }
    .umr-upload-zone p { margin: 0; color: #777; font-size: .85rem; }
    .umr-upload-zone strong { color: var(--green); }

    /* ── Image previews ── */
    #umr-preview-container {
        display: flex; flex-wrap: wrap; gap: 10px; margin-top: 14px;
    }
    .umr-preview-thumb {
        position: relative; width: 80px; height: 80px; border-radius: 6px; overflow: hidden;
        border: 2px solid #d4ede3;
    }
    .umr-preview-thumb img { width: 100%; height: 100%; object-fit: cover; }
    .umr-preview-thumb .remove-thumb {
        position: absolute; top: 2px; right: 2px;
        background: rgba(220,53,69,.85); color: #fff;
        border: none; border-radius: 50%; width: 18px; height: 18px;
        font-size: 10px; line-height: 18px; text-align: center;
        cursor: pointer; padding: 0;
    }

    /* ── Submit button ── */
    .umr-submit-btn {
        background: var(--green);
        color: #fff;
        border: none;
        padding: 13px 40px;
        border-radius: 6px;
        font-size: 1rem;
        font-weight: 600;
        letter-spacing: .02em;
        transition: background .2s, transform .1s;
        width: 100%;
        margin-top: 10px;
    }
    .umr-submit-btn:hover { background: var(--green-dark); transform: translateY(-1px); color: #fff; }
    .umr-submit-btn:active { transform: translateY(0); }

    /* ── Success alert ── */
    .umr-success-box {
        background: var(--green-pale);
        border: 2px solid var(--green);
        border-radius: var(--radius);
        padding: 28px 30px;
        margin-bottom: 28px;
        display: flex; gap: 16px; align-items: flex-start;
    }
    .umr-success-box .icon { font-size: 2.2rem; color: var(--green); flex-shrink: 0; }
    .umr-success-box h4 { color: var(--green-dark); font-weight: 700; margin: 0 0 6px; }
    .umr-success-box .tracking-chip {
        display: inline-block;
        background: var(--green);
        color: #fff;
        font-size: 1.1rem;
        font-weight: 700;
        font-family: monospace;
        padding: 6px 18px;
        border-radius: 6px;
        letter-spacing: .06em;
        margin: 4px 0;
    }
    .umr-success-box p { margin: 8px 0 0; color: #2d6a4f; font-size: .9rem; }

    /* ── Error summary ── */
    .umr-error-box {
        background: var(--red-soft);
        border: 1px solid var(--red-border);
        border-radius: var(--radius);
        padding: 16px 20px;
        margin-bottom: 20px;
    }
    .umr-error-box ul { margin: 6px 0 0; padding-left: 18px; font-size: .85rem; color: #721c24; }
</style>
@endpush

@section('title')
    @if(session()->get('language') == 'bangla') মেডিসিন রিপোর্ট @else Unsafe Medicine Report @endif
@endsection

@section('content')

{{-- ═══════════════════════════════════════════════════════════ BANNER ══ --}}
<div class="umr-banner">
    <div class="container">
        <h1>
            @if(session()->get('language') == 'bangla')
                অনিরাপদ ওষুধ রিপোর্ট করুন
            @else
                Report Unsafe Medicine
            @endif
        </h1>
        <p>
            @if(session()->get('language') == 'bangla')
                ভেজাল ও নকল ওষুধ থেকে জনগণকে রক্ষা করুন — আপনার রিপোর্টই পরিবর্তন আনতে পারে।
            @else
                Protect the public from counterfeit &amp; substandard medicines — your report makes a difference.
            @endif
        </p>
        <ul class="umr-breadcrumb">
            <li><a href="{{ route('front.page') }}">
                @if(session()->get('language') == 'bangla') হোম @else Home @endif
            </a></li>
            <li>@if(session()->get('language') == 'bangla') মেডিসিন রিপোর্ট @else Unsafe Medicine Report @endif</li>
        </ul>
    </div>
</div>

{{-- ════════════════════════════════════════════════════════════ BODY ══ --}}
<div class="umr-wrapper">
    <div class="container">
        <div class="row" style="align-items: flex-start;">

            {{-- ─── LEFT : INFO PANEL ─────────────────────────────────────── --}}
            <div class="col-md-4" style="margin-bottom: 30px;">
                <div class="umr-info-panel">

                    <h3>
                        @if(session()->get('language') == 'bangla')
                            আপনার রিপোর্ট কেন গুরুত্বপূর্ণ?
                        @else
                            Why Your Report Matters
                        @endif
                    </h3>

                    {{-- Step 1 --}}
                    <div class="umr-step">
                        <div class="umr-step-num">১</div>
                        <div class="umr-step-body">
                            <h5>@if(session()->get('language') == 'bangla') ফর্ম পূরণ করুন @else Fill the Form @endif</h5>
                            <p>@if(session()->get('language') == 'bangla') ওষুধ ও ফার্মেসির তথ্য দিন এবং প্রয়োজনে ছবি আপলোড করুন। @else Provide medicine &amp; pharmacy details, and upload evidence photos. @endif</p>
                        </div>
                    </div>

                    {{-- Step 2 --}}
                    <div class="umr-step">
                        <div class="umr-step-num">২</div>
                        <div class="umr-step-body">
                            <h5>@if(session()->get('language') == 'bangla') ট্র্যাকিং নম্বর পান @else Get a Tracking Number @endif</h5>
                            <p>@if(session()->get('language') == 'bangla') জমা দেওয়ার পরপরই আপনাকে একটি অনন্য ট্র্যাকিং কোড দেওয়া হবে। @else After submission you instantly receive a unique tracking code. @endif</p>
                        </div>
                    </div>

                    {{-- Step 3 --}}
                    <div class="umr-step">
                        <div class="umr-step-num">৩</div>
                        <div class="umr-step-body">
                            <h5>@if(session()->get('language') == 'bangla') তদন্ত @else Investigation @endif</h5>
                            <p>@if(session()->get('language') == 'bangla') আমাদের দল রিপোর্টটি যাচাই করবে এবং প্রয়োজনীয় ব্যবস্থা নেবে। @else Our team verifies the report and takes necessary action. @endif</p>
                        </div>
                    </div>

                    {{-- Step 4 --}}
                    <div class="umr-step">
                        <div class="umr-step-num">৪</div>
                        <div class="umr-step-body">
                            <h5>@if(session()->get('language') == 'bangla') সমাধান @else Resolution @endif</h5>
                            <p>@if(session()->get('language') == 'bangla') ফার্মেসিকে কালো তালিকাভুক্ত করা বা কর্তৃপক্ষকে অবহিত করা হয়। @else Pharmacy is blacklisted or relevant authorities are notified. @endif</p>
                        </div>
                    </div>

                    {{-- Anonymous badge --}}
                    <div class="umr-anon-badge">
                        <span class="icon"><i class="fa fa-user-secret"></i></span>
                        <p>
                            @if(session()->get('language') == 'bangla')
                                <strong>বেনামী রিপোর্ট সম্পূর্ণ গ্রহণযোগ্য।</strong> আপনার নাম ও ফোন নম্বর দেওয়া ঐচ্ছিক।
                            @else
                                <strong>Anonymous reports are fully accepted.</strong> Your name &amp; phone number are entirely optional.
                            @endif
                        </p>
                    </div>

                    {{-- Warning badge --}}
                    <div class="umr-warning-badge">
                        <span class="icon"><i class="fa fa-exclamation-triangle"></i></span>
                        <p>
                            @if(session()->get('language') == 'bangla')
                                মিথ্যা বা বিদ্বেষমূলক রিপোর্ট করবেন না। যাচাইযোগ্য তথ্য প্রদান করুন।
                            @else
                                Do not submit false or malicious reports. Only provide verifiable information.
                            @endif
                        </p>
                    </div>

                </div>
            </div>{{-- /col --}}

            {{-- ─── RIGHT : FORM PANEL ────────────────────────────────────── --}}
            <div class="col-md-8">
                <div class="umr-form-panel">

                    {{-- ── Success message ── --}}
                    @if(session('success'))
                    <div class="umr-success-box">
                        <div class="icon"><i class="fa fa-check-circle"></i></div>
                        <div>
                            <h4>@if(session()->get('language') == 'bangla') রিপোর্ট সফলভাবে জমা হয়েছে! @else Report Submitted Successfully! @endif</h4>
                            <div class="tracking-chip">{{ session('tracking_number') }}</div>
                            <p>
                                @if(session()->get('language') == 'bangla')
                                    উপরের ট্র্যাকিং নম্বরটি সংরক্ষণ করুন। এটি দিয়ে পরবর্তীতে আপনার রিপোর্টের অবস্থা জানতে পারবেন।
                                @else
                                    Please save this tracking number. You can use it to follow up on your report's status later.
                                @endif
                            </p>
                        </div>
                    </div>
                    @endif

                    {{-- ── Validation errors ── --}}
                    @if($errors->any())
                    <div class="umr-error-box">
                        <strong style="color:#721c24;">
                            @if(session()->get('language') == 'bangla') কিছু তথ্য সঠিক নয়: @else Please fix the following errors: @endif
                        </strong>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <h3>
                        @if(session()->get('language') == 'bangla') রিপোর্ট ফর্ম @else Report Form @endif
                    </h3>
                    <p class="subtitle">
                        @if(session()->get('language') == 'bangla')
                            <span class="req" style="color:#e03131;">*</span> চিহ্নিত ঘরগুলো পূরণ করা আবশ্যক।
                        @else
                            Fields marked <span style="color:#e03131;">*</span> are required.
                        @endif
                    </p>

                    <form method="POST"
                          action="{{ route('unsafe.medicine.report.store') }}"
                          enctype="multipart/form-data"
                          id="umrForm">
                        @csrf

                        {{-- ════ SECTION 1 : Reporter Info ════ --}}
                        <div class="umr-section-label">
                            <i class="fa fa-user"></i>
                            @if(session()->get('language') == 'bangla') প্রতিবেদনকারীর তথ্য (ঐচ্ছিক) @else Reporter Info (Optional) @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="reporter_name">
                                        @if(session()->get('language') == 'bangla') নাম @else Name @endif
                                        <span class="opt">(@if(session()->get('language') == 'bangla') ঐচ্ছিক @else optional @endif)</span>
                                    </label>
                                    <input type="text"
                                           name="reporter_name"
                                           id="reporter_name"
                                           value="{{ old('reporter_name') }}"
                                           class="form-control {{ $errors->has('reporter_name') ? 'is-invalid' : '' }}"
                                           placeholder="@if(session()->get('language') == 'bangla') আপনার নাম @else Your full name @endif">
                                    @if($errors->has('reporter_name'))
                                        <div class="invalid-feedback">{{ $errors->first('reporter_name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="reporter_phone">
                                        @if(session()->get('language') == 'bangla') ফোন নম্বর @else Phone Number @endif
                                        <span class="opt">(@if(session()->get('language') == 'bangla') ঐচ্ছিক @else optional @endif)</span>
                                    </label>
                                    <input type="text"
                                           name="reporter_phone"
                                           id="reporter_phone"
                                           value="{{ old('reporter_phone') }}"
                                           class="form-control {{ $errors->has('reporter_phone') ? 'is-invalid' : '' }}"
                                           placeholder="@if(session()->get('language') == 'bangla') ০১XXXXXXXXX @else 01XXXXXXXXX @endif">
                                    @if($errors->has('reporter_phone'))
                                        <div class="invalid-feedback">{{ $errors->first('reporter_phone') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- ════ SECTION 2 : Medicine Details ════ --}}
                        <div class="umr-section-label">
                            <i class="fa fa-medkit"></i>
                            @if(session()->get('language') == 'bangla') ওষুধের তথ্য @else Medicine Details @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="medicine_name">
                                        @if(session()->get('language') == 'bangla') ওষুধের নাম @else Medicine Name @endif
                                        <span class="req">*</span>
                                    </label>
                                    <input type="text"
                                           name="medicine_name"
                                           id="medicine_name"
                                           value="{{ old('medicine_name') }}"
                                           class="form-control {{ $errors->has('medicine_name') ? 'is-invalid' : '' }}"
                                           placeholder="@if(session()->get('language') == 'bangla') যেমন: Napa 500mg @else e.g. Napa 500mg @endif"
                                           required>
                                    @if($errors->has('medicine_name'))
                                        <div class="invalid-feedback">{{ $errors->first('medicine_name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="batch_number">
                                        @if(session()->get('language') == 'bangla') ব্যাচ নম্বর @else Batch Number @endif
                                        <span class="opt">(@if(session()->get('language') == 'bangla') ঐচ্ছিক @else optional @endif)</span>
                                    </label>
                                    <input type="text"
                                           name="batch_number"
                                           id="batch_number"
                                           value="{{ old('batch_number') }}"
                                           class="form-control {{ $errors->has('batch_number') ? 'is-invalid' : '' }}"
                                           placeholder="@if(session()->get('language') == 'bangla') প্যাকেটে উল্লেখিত ব্যাচ নম্বর @else Batch no. from the packet @endif">
                                    @if($errors->has('batch_number'))
                                        <div class="invalid-feedback">{{ $errors->first('batch_number') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- ════ SECTION 3 : Pharmacy Details ════ --}}
                        <div class="umr-section-label">
                            <i class="fa fa-hospital-o"></i>
                            @if(session()->get('language') == 'bangla') ফার্মেসির তথ্য @else Pharmacy Details @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pharmacy_name">
                                        @if(session()->get('language') == 'bangla') ফার্মেসির নাম @else Pharmacy Name @endif
                                        <span class="req">*</span>
                                    </label>
                                    <input type="text"
                                           name="pharmacy_name"
                                           id="pharmacy_name"
                                           value="{{ old('pharmacy_name') }}"
                                           class="form-control {{ $errors->has('pharmacy_name') ? 'is-invalid' : '' }}"
                                           placeholder="@if(session()->get('language') == 'bangla') ফার্মেসির নাম @else Pharmacy / drug store name @endif"
                                           required>
                                    @if($errors->has('pharmacy_name'))
                                        <div class="invalid-feedback">{{ $errors->first('pharmacy_name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district">
                                        @if(session()->get('language') == 'bangla') জেলা @else District @endif
                                        <span class="req">*</span>
                                    </label>
                                    <select name="district"
                                            id="district"
                                            class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}"
                                            required>
                                        <option value="">— @if(session()->get('language') == 'bangla') জেলা নির্বাচন করুন @else Select District @endif —</option>
                                        @php
                                            $districts = [
                                                'Bagerhat','Bandarban','Barguna','Barishal','Bhola','Bogura',
                                                'Brahmanbaria','Chandpur','Chapai Nawabganj','Chattogram',
                                                'Chuadanga',"Cox's Bazar",'Cumilla','Dhaka','Dinajpur',
                                                'Faridpur','Feni','Gaibandha','Gazipur','Gopalganj',
                                                'Habiganj','Jamalpur','Jashore','Jhalokathi','Jhenaidah',
                                                'Joypurhat','Khagrachari','Khulna','Kishoreganj','Kurigram',
                                                'Kushtia','Lakshmipur','Lalmonirhat','Madaripur','Magura',
                                                'Manikganj','Meherpur','Moulvibazar','Munshiganj','Mymensingh',
                                                'Naogaon','Narail','Narayanganj','Narsingdi','Natore',
                                                'Netrokona','Nilphamari','Noakhali','Pabna','Panchagarh',
                                                'Patuakhali','Pirojpur','Rajbari','Rajshahi','Rangamati',
                                                'Rangpur','Satkhira','Shariatpur','Sherpur','Sirajganj',
                                                'Sunamganj','Sylhet','Tangail','Thakurgaon',
                                            ];
                                        @endphp
                                        @foreach($districts as $d)
                                            <option value="{{ $d }}" {{ old('district') == $d ? 'selected' : '' }}>
                                                {{ $d }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('district'))
                                        <div class="invalid-feedback">{{ $errors->first('district') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pharmacy_address">
                                @if(session()->get('language') == 'bangla') ফার্মেসির ঠিকানা @else Pharmacy Address @endif
                                <span class="req">*</span>
                            </label>
                            <textarea name="pharmacy_address"
                                      id="pharmacy_address"
                                      rows="2"
                                      class="form-control {{ $errors->has('pharmacy_address') ? 'is-invalid' : '' }}"
                                      placeholder="@if(session()->get('language') == 'bangla') রাস্তা, এলাকা, উপজেলা @else Street, area, upazila @endif"
                                      required>{{ old('pharmacy_address') }}</textarea>
                            @if($errors->has('pharmacy_address'))
                                <div class="invalid-feedback">{{ $errors->first('pharmacy_address') }}</div>
                            @endif
                        </div>

                        {{-- ════ SECTION 4 : Issue Description ════ --}}
                        <div class="umr-section-label">
                            <i class="fa fa-file-text-o"></i>
                            @if(session()->get('language') == 'bangla') সমস্যার বিবরণ @else Issue Description @endif
                        </div>

                        <div class="form-group">
                            <label for="description">
                                @if(session()->get('language') == 'bangla') বিস্তারিত বিবরণ @else Detailed Description @endif
                                <span class="req">*</span>
                            </label>
                            <textarea name="description"
                                      id="description"
                                      rows="5"
                                      class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                      placeholder="@if(session()->get('language') == 'bangla') ওষুধটির কী সমস্যা লক্ষ্য করেছেন? প্যাকেজিং, গন্ধ, রঙ, কার্যকারিতা ইত্যাদি বর্ণনা করুন। @else Describe the problem: packaging, smell, colour, suspected counterfeiting, side effects observed, etc. @endif"
                                      required>{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                            @endif
                        </div>

                        {{-- ════ SECTION 5 : Evidence ════ --}}
                        <div class="umr-section-label">
                            <i class="fa fa-camera"></i>
                            @if(session()->get('language') == 'bangla') প্রমাণ (ঐচ্ছিক) @else Evidence (Optional) @endif
                        </div>

                        {{-- Image upload --}}
                        <div class="form-group">
                            <label>
                                @if(session()->get('language') == 'bangla') ছবি আপলোড @else Upload Images @endif
                                <span class="opt">(@if(session()->get('language') == 'bangla') সর্বোচ্চ ৫টি, প্রতিটি সর্বোচ্চ ৪ MB @else max 5 files, 4 MB each @endif)</span>
                            </label>
                            <div class="umr-upload-zone" id="umrDropZone">
                                <input type="file"
                                       name="images[]"
                                       id="umrImages"
                                       accept="image/jpeg,image/png,image/jpg"
                                       multiple>
                                <span class="upload-icon"><i class="fa fa-cloud-upload"></i></span>
                                <p>
                                    @if(session()->get('language') == 'bangla')
                                        <strong>ক্লিক করুন</strong> অথবা এখানে ছবি টেনে আনুন
                                    @else
                                        <strong>Click to browse</strong> or drag &amp; drop images here
                                    @endif
                                </p>
                                <p style="margin-top:4px; font-size:.75rem; color:#aaa;">JPEG, PNG &bull; Max 4 MB each &bull; Up to 5 files</p>
                            </div>
                            @if($errors->has('images') || $errors->has('images.*'))
                                <div class="invalid-feedback" style="display:block;">
                                    {{ $errors->first('images') ?: $errors->first('images.*') }}
                                </div>
                            @endif
                            <div id="umr-preview-container"></div>
                        </div>

                        {{-- YouTube video --}}
                        <div class="form-group">
                            <label for="video">
                                @if(session()->get('language') == 'bangla') ইউটিউব ভিডিও লিংক @else YouTube Video Link @endif
                                <span class="opt">(@if(session()->get('language') == 'bangla') ঐচ্ছিক @else optional @endif)</span>
                            </label>
                            <div style="position:relative;">
                                <span style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#c00;">
                                    <i class="fa fa-youtube-play"></i>
                                </span>
                                <input type="url"
                                       name="video"
                                       id="video"
                                       value="{{ old('video') }}"
                                       class="form-control {{ $errors->has('video') ? 'is-invalid' : '' }}"
                                       style="padding-left: 34px;"
                                       placeholder="https://youtube.com/watch?v=...">
                            </div>
                            @if($errors->has('video'))
                                <div class="invalid-feedback">{{ $errors->first('video') }}</div>
                            @endif
                        </div>

                        {{-- ════ SUBMIT ════ --}}
                        <button type="submit" class="umr-submit-btn" id="umrSubmit">
                            <i class="fa fa-paper-plane-o" style="margin-right: 8px;"></i>
                            @if(session()->get('language') == 'bangla')
                                রিপোর্ট জমা দিন
                            @else
                                Submit Report
                            @endif
                        </button>

                    </form>
                </div>{{-- /form-panel --}}
            </div>{{-- /col --}}

        </div>{{-- /row --}}
    </div>{{-- /container --}}
</div>{{-- /wrapper --}}

@endsection

@push('frontend_script')
<script>
(function () {
    'use strict';

    /* ── Image preview ── */
    var input     = document.getElementById('umrImages');
    var container = document.getElementById('umr-preview-container');
    var dropZone  = document.getElementById('umrDropZone');

    if (!input) return;

    input.addEventListener('change', function () {
        renderPreviews(this.files);
    });

    function renderPreviews(files) {
        container.innerHTML = '';
        var max = 5;
        var arr = Array.prototype.slice.call(files, 0, max);
        arr.forEach(function (file) {
            if (!file.type.match('image.*')) return;
            var reader = new FileReader();
            reader.onload = function (e) {
                var thumb = document.createElement('div');
                thumb.className = 'umr-preview-thumb';
                thumb.innerHTML =
                    '<img src="' + e.target.result + '" alt="preview">' +
                    '<button type="button" class="remove-thumb" title="Remove">✕</button>';
                container.appendChild(thumb);
            };
            reader.readAsDataURL(file);
        });
    }

    /* ── Submit spinner ── */
    var form = document.getElementById('umrForm');
    var btn  = document.getElementById('umrSubmit');
    if (form && btn) {
        form.addEventListener('submit', function () {
            btn.disabled = true;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin" style="margin-right:8px;"></i>'
                + (document.documentElement.lang === 'bn' ? 'জমা হচ্ছে...' : 'Submitting...');
        });
    }

    /* ── Drag & drop highlight ── */
    if (dropZone) {
        ['dragenter', 'dragover'].forEach(function (evt) {
            dropZone.addEventListener(evt, function (e) {
                e.preventDefault();
                dropZone.style.background    = 'var(--green-pale)';
                dropZone.style.borderColor   = 'var(--green)';
            });
        });
        ['dragleave', 'drop'].forEach(function (evt) {
            dropZone.addEventListener(evt, function (e) {
                e.preventDefault();
                dropZone.style.background  = '';
                dropZone.style.borderColor = '';
                if (evt === 'drop' && e.dataTransfer.files.length) {
                    input.files = e.dataTransfer.files;
                    renderPreviews(e.dataTransfer.files);
                }
            });
        });
    }
})();
</script>
@endpush
