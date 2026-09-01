@extends('admin.master')

@section('title', ' - Members Management')

@section('body')
<div class="row page-titles">
    <div class="col-md-6 align-self-center">
        <h4 class="text-themecolor font-weight-bold">
            <i class="fa fa-users text-theme-colored mr-2"></i> Members Management (সদস্য ব্যবস্থাপনা)
        </h4>
    </div>
    <div class="col-md-6 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Members</li>
            </ol>
            <a href="{{ route('admin.member_categories.index') }}" class="btn btn-outline-info font-weight-bold ml-2">
                <i class="fa fa-id-card-o mr-1"></i> Member Categories
            </a>
            <a href="{{ route('admin.members.create') }}" class="btn btn-success font-weight-bold ml-2 text-white">
                <i class="fa fa-plus-circle mr-1"></i> Add New Member
            </a>
        </div>
    </div>
</div>

@if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle mr-2"></i> {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- Metric Summary Cards -->
<div class="row mb-4">
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card bg-light border shadow-sm h-100">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="p-3 bg-dark text-white rounded mr-3">
                        <i class="fa fa-users fa-2x"></i>
                    </div>
                    <div>
                        <h4 class="font-weight-bold mb-0">{{ $counts['all'] }}</h4>
                        <span class="text-muted small font-weight-bold text-uppercase">Total Members</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card bg-light border shadow-sm h-100">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="p-3 bg-success text-white rounded mr-3" style="background-color: #29b54e !important;">
                        <i class="fa fa-check-circle fa-2x"></i>
                    </div>
                    <div>
                        <h4 class="font-weight-bold mb-0 text-success">{{ $counts['approved'] }}</h4>
                        <span class="text-muted small font-weight-bold text-uppercase">Approved Members</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card bg-light border shadow-sm h-100">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="p-3 bg-warning text-white rounded mr-3" style="background-color: #ff9800 !important;">
                        <i class="fa fa-clock-o fa-2x"></i>
                    </div>
                    <div>
                        <h4 class="font-weight-bold mb-0 text-warning">{{ $counts['pending'] }}</h4>
                        <span class="text-muted small font-weight-bold text-uppercase">Pending Applications</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card bg-light border shadow-sm h-100">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <div class="p-3 bg-danger text-white rounded mr-3">
                        <i class="fa fa-times-circle fa-2x"></i>
                    </div>
                    <div>
                        <h4 class="font-weight-bold mb-0 text-danger">{{ $counts['rejected'] }}</h4>
                        <span class="text-muted small font-weight-bold text-uppercase">Rejected Applications</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Filters & Search Bar -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-3 bg-light rounded">
        <form action="{{ route('admin.members.index') }}" method="GET" class="row align-items-center">
            <div class="col-md-4 col-sm-6 mb-2 mb-md-0">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" 
                           placeholder="Search by name, phone, email, designation..." 
                           value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-2 mb-md-0">
                <select name="category_id" class="form-control" onchange="this.form.submit()">
                    <option value="">— All Member Categories —</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }} @if($cat->name_bn) ({{ $cat->name_bn }}) @endif
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 col-sm-6 mb-2 mb-md-0">
                <select name="status" class="form-control" onchange="this.form.submit()">
                    <option value="">— All Statuses —</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved (অনুমোদিত)</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending (অপেক্ষমাণ / আবেদন)</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected (বাতিলকৃত)</option>
                </select>
            </div>

            <div class="col-md-2 col-sm-6 text-md-right">
                @if(request()->hasAny(['search', 'category_id', 'status']))
                    <a href="{{ route('admin.members.index') }}" class="btn btn-outline-secondary btn-block">
                        <i class="fa fa-refresh mr-1"></i> Reset
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Member List Table -->
<div class="card shadow-sm border-0">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <span class="font-weight-bold"><i class="fa fa-list mr-1"></i> Member List ({{ $members->total() }} Members)</span>
        <div class="btn-group btn-group-sm">
            <a href="{{ route('admin.members.index') }}" class="btn {{ !request('status') ? 'btn-primary text-white' : 'btn-outline-light' }}">All</a>
            <a href="{{ route('admin.members.index', ['status' => 'pending']) }}" class="btn {{ request('status') == 'pending' ? 'btn-warning text-dark font-weight-bold' : 'btn-outline-light' }}">
                Pending ({{ $counts['pending'] }})
            </a>
            <a href="{{ route('admin.members.index', ['status' => 'approved']) }}" class="btn {{ request('status') == 'approved' ? 'btn-success text-white font-weight-bold' : 'btn-outline-light' }}">Approved</a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead class="thead-light">
                    <tr>
                        <th style="width: 70px;">Photo</th>
                        <th>Member Info</th>
                        <th>Category</th>
                        <th>Designation / Profession</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th class="text-right" style="min-width: 180px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $member)
                        <tr>
                            <!-- Photo -->
                            <td class="align-middle">
                                @if($member->photo && file_exists(public_path($member->photo)))
                                    <img src="{{ asset($member->photo) }}" alt="{{ $member->name }}" 
                                         class="rounded-circle border" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center border" 
                                         style="width: 50px; height: 50px; font-weight: bold; font-size: 18px;">
                                        {{ strtoupper(substr($member->name, 0, 1)) }}
                                    </div>
                                @endif
                            </td>

                            <!-- Member Info -->
                            <td class="align-middle">
                                <div class="font-weight-bold text-dark font-15">{{ $member->name }}</div>
                                @if($member->name_bn)
                                    <div class="text-muted small">{{ $member->name_bn }}</div>
                                @endif
                                @if($member->member_id_no)
                                    <span class="badge badge-light border text-primary">ID: {{ $member->member_id_no }}</span>
                                @endif
                            </td>

                            <!-- Category -->
                            <td class="align-middle">
                                @if($member->category)
                                    <span class="badge badge-info p-1 font-weight-normal font-13">
                                        {{ $member->category->name }}
                                    </span>
                                    @if($member->category->name_bn)
                                        <div class="small text-muted">{{ $member->category->name_bn }}</div>
                                    @endif
                                @else
                                    <span class="badge badge-secondary">Uncategorized</span>
                                @endif
                            </td>

                            <!-- Designation & Profession -->
                            <td class="align-middle">
                                <div class="font-weight-bold text-dark">{{ $member->designation ?: 'Member' }}</div>
                                @if($member->organization)
                                    <div class="small text-muted"><i class="fa fa-building-o mr-1"></i> {{ $member->organization }}</div>
                                @elseif($member->profession)
                                    <div class="small text-muted"><i class="fa fa-briefcase mr-1"></i> {{ $member->profession }}</div>
                                @endif
                            </td>

                            <!-- Contact -->
                            <td class="align-middle">
                                <div><i class="fa fa-phone text-success mr-1"></i> {{ $member->phone }}</div>
                                @if($member->email)
                                    <div class="small text-muted"><i class="fa fa-envelope-o text-info mr-1"></i> {{ $member->email }}</div>
                                @endif
                            </td>

                            <!-- Status -->
                            <td class="align-middle">
                                @if($member->status === 'approved')
                                    <span class="badge badge-success px-2 py-1 font-weight-bold">
                                        <i class="fa fa-check mr-1"></i> Approved
                                    </span>
                                @elseif($member->status === 'pending')
                                    <span class="badge badge-warning px-2 py-1 text-dark font-weight-bold animate-pulse">
                                        <i class="fa fa-clock-o mr-1"></i> Pending
                                    </span>
                                @else
                                    <span class="badge badge-danger px-2 py-1 font-weight-bold">
                                        <i class="fa fa-times mr-1"></i> Rejected
                                    </span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="text-right align-middle">
                                <!-- Status quick update buttons -->
                                @if($member->status === 'pending')
                                    <form action="{{ route('admin.members.status', $member->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="btn btn-sm btn-success" title="Approve Member">
                                            <i class="fa fa-check"></i> Approve
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.members.status', $member->id) }}" method="POST" class="d-inline-block" 
                                          onsubmit="return confirm('Are you sure you want to reject this application?');">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Reject Member">
                                            <i class="fa fa-ban"></i> Reject
                                        </button>
                                    </form>
                                @elseif($member->status === 'rejected')
                                    <form action="{{ route('admin.members.status', $member->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="btn btn-sm btn-outline-success" title="Approve Member">
                                            <i class="fa fa-check"></i> Approve
                                        </button>
                                    </form>
                                @endif

                                <a href="{{ route('admin.members.show', $member->id) }}" class="btn btn-sm btn-info text-white" title="View Profile">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.members.edit', $member->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST" class="d-inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this member permanently?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fa fa-users fa-3x mb-3 d-block text-muted"></i>
                                <h5>No members found</h5>
                                <p class="mb-0">Try changing your search filters or <a href="{{ route('admin.members.create') }}">add a new member</a>.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($members->hasPages())
        <div class="card-footer bg-white d-flex justify-content-between align-items-center">
            <span class="text-muted small">Showing {{ $members->firstItem() ?? 0 }} to {{ $members->lastItem() ?? 0 }} of {{ $members->total() }} entries</span>
            {{ $members->links() }}
        </div>
    @endif
</div>
@endsection
