@extends('admin.master')

@section('title', ' - Member Details')

@section('body')
<div class="row page-titles">
    <div class="col-md-6 align-self-center">
        <h4 class="text-themecolor font-weight-bold">
            <i class="fa fa-user text-theme-colored mr-2"></i> Member Profile: {{ $member->name }}
        </h4>
    </div>
    <div class="col-md-6 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.members.index') }}">Members</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
            <a href="{{ route('admin.members.index') }}" class="btn btn-secondary font-weight-bold ml-2">
                <i class="fa fa-arrow-left mr-1"></i> Back to Members
            </a>
            <button onclick="window.print()" class="btn btn-outline-dark ml-2">
                <i class="fa fa-print mr-1"></i> Print
            </button>
        </div>
    </div>
</div>

<div class="row">
    <!-- Left Column: Member ID Card -->
    <div class="col-lg-4 mb-4">
        <div class="card shadow-sm border-0 text-center">
            <div class="card-body py-4">
                <div class="mb-3">
                    @if($member->photo && file_exists(public_path($member->photo)))
                        <img src="{{ asset($member->photo) }}" alt="{{ $member->name }}" 
                             class="rounded-circle img-thumbnail border shadow-sm" 
                             style="width: 140px; height: 140px; object-fit: cover;">
                    @else
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto shadow-sm" 
                             style="width: 140px; height: 140px; font-weight: bold; font-size: 48px;">
                            {{ strtoupper(substr($member->name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <h4 class="font-weight-bold mb-1 text-dark">{{ $member->name }}</h4>
                @if($member->name_bn)
                    <p class="text-muted font-16 mb-2">{{ $member->name_bn }}</p>
                @endif

                <div class="mb-3">
                    @if($member->category)
                        <span class="badge badge-info px-3 py-2 font-13 font-weight-bold">
                            {{ $member->category->name }}
                        </span>
                    @endif
                </div>

                <div class="text-left bg-light p-3 rounded mb-3">
                    <div class="mb-2">
                        <span class="text-muted font-weight-bold">Designation:</span> 
                        <span class="font-weight-bold text-dark float-right">{{ $member->designation ?: 'Member' }}</span>
                    </div>
                    @if($member->organization)
                        <div class="mb-2">
                            <span class="text-muted font-weight-bold">Organization:</span> 
                            <span class="font-weight-bold text-dark float-right">{{ $member->organization }}</span>
                        </div>
                    @endif
                    @if($member->profession)
                        <div class="mb-2">
                            <span class="text-muted font-weight-bold">Profession:</span> 
                            <span class="font-weight-bold text-dark float-right">{{ $member->profession }}</span>
                        </div>
                    @endif
                    @if($member->member_id_no)
                        <div class="mb-2">
                            <span class="text-muted font-weight-bold">Member ID:</span> 
                            <span class="badge badge-primary float-right">{{ $member->member_id_no }}</span>
                        </div>
                    @endif
                    <div>
                        <span class="text-muted font-weight-bold">Status:</span> 
                        <span class="float-right">
                            @if($member->status === 'approved')
                                <span class="badge badge-success font-weight-bold">✓ Approved</span>
                            @elseif($member->status === 'pending')
                                <span class="badge badge-warning font-weight-bold text-dark">⏳ Pending Approval</span>
                            @else
                                <span class="badge badge-danger font-weight-bold">✕ Rejected</span>
                            @endif
                        </span>
                    </div>
                </div>

                <!-- Quick Action Buttons -->
                <div class="d-flex justify-content-center gap-2">
                    @if($member->status === 'pending')
                        <form action="{{ route('admin.members.status', $member->id) }}" method="POST" class="mr-2">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="approved">
                            <button type="submit" class="btn btn-success font-weight-bold text-white">
                                <i class="fa fa-check mr-1"></i> Approve Member
                            </button>
                        </form>
                        <form action="{{ route('admin.members.status', $member->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to reject this member?');">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fa fa-ban mr-1"></i> Reject
                            </button>
                        </form>
                    @endif
                    <a href="{{ route('admin.members.edit', $member->id) }}" class="btn btn-primary ml-2">
                        <i class="fa fa-edit mr-1"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Full Details -->
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-dark text-white font-weight-bold">
                <i class="fa fa-info-circle mr-1"></i> Detailed Information
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th style="width: 30%;">Full Name</th>
                            <td>{{ $member->name }} @if($member->name_bn) ({{ $member->name_bn }}) @endif</td>
                        </tr>
                        <tr>
                            <th>Father's Name</th>
                            <td>{{ $member->father_name ?: '—' }}</td>
                        </tr>
                        <tr>
                            <th>Mother's Name</th>
                            <td>{{ $member->mother_name ?: '—' }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td><a href="tel:{{ $member->phone }}" class="font-weight-bold text-success"><i class="fa fa-phone mr-1"></i> {{ $member->phone }}</a></td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td>
                                @if($member->email)
                                    <a href="mailto:{{ $member->email }}" class="text-primary"><i class="fa fa-envelope mr-1"></i> {{ $member->email }}</a>
                                @else
                                    —
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $member->category ? $member->category->name : 'Uncategorized' }}</td>
                        </tr>
                        <tr>
                            <th>Designation</th>
                            <td>{{ $member->designation ?: '—' }} @if($member->designation_bn) ({{ $member->designation_bn }}) @endif</td>
                        </tr>
                        <tr>
                            <th>Profession</th>
                            <td>{{ $member->profession ?: '—' }}</td>
                        </tr>
                        <tr>
                            <th>Organization / Work</th>
                            <td>{{ $member->organization ?: '—' }}</td>
                        </tr>
                        <tr>
                            <th>Blood Group</th>
                            <td><span class="badge badge-danger">{{ $member->blood_group ?: '—' }}</span></td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $member->gender ?: '—' }}</td>
                        </tr>
                        <tr>
                            <th>NID / Passport</th>
                            <td>{{ $member->nid_passport ?: '—' }}</td>
                        </tr>
                        <tr>
                            <th>Present Address</th>
                            <td>{{ $member->present_address ?: '—' }}</td>
                        </tr>
                        <tr>
                            <th>Permanent Address</th>
                            <td>{{ $member->permanent_address ?: '—' }}</td>
                        </tr>
                        <tr>
                            <th>Social Links</th>
                            <td>
                                @if($member->facebook)
                                    <a href="{{ $member->facebook }}" target="_blank" class="btn btn-sm btn-outline-primary mr-2"><i class="fa fa-facebook"></i> Facebook</a>
                                @endif
                                @if($member->linkedin)
                                    <a href="{{ $member->linkedin }}" target="_blank" class="btn btn-sm btn-outline-info"><i class="fa fa-linkedin"></i> LinkedIn</a>
                                @endif
                                @if(!$member->facebook && !$member->linkedin)
                                    —
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Short Bio</th>
                            <td>{{ $member->bio ?: '—' }}</td>
                        </tr>
                        @if($member->status === 'rejected' && $member->rejection_reason)
                            <tr class="table-danger">
                                <th class="text-danger">Rejection Reason</th>
                                <td class="text-danger font-weight-bold">{{ $member->rejection_reason }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Registration Date</th>
                            <td>{{ $member->created_at ? $member->created_at->format('d M, Y - h:i A') : '—' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
