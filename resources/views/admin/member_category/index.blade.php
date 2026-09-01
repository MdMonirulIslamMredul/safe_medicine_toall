@extends('admin.master')

@section('title', ' - Member Categories')

@section('body')
<div class="row page-titles">
    <div class="col-md-6 align-self-center">
        <h4 class="text-themecolor font-weight-bold">
            <i class="fa fa-id-card-o text-theme-colored mr-2"></i> Member Categories (সদস্য ক্যাটাগরি)
        </h4>
    </div>
    <div class="col-md-6 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.members.index') }}">Members</a></li>
                <li class="breadcrumb-item active">Categories</li>
            </ol>
            <a href="{{ route('admin.members.index') }}" class="btn btn-outline-info font-weight-bold ml-2">
                <i class="fa fa-users mr-1"></i> All Members
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

<div class="row">
    <!-- Quick Add Category Form -->
    <div class="col-lg-4 col-md-5 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white font-weight-bold">
                <i class="fa fa-plus-circle mr-1"></i> Add New Member Category
            </div>
            <div class="card-body">
                <form action="{{ route('admin.member_categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Category Name (English) <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name') }}" placeholder="e.g., Advisor Committee" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Category Name (Bangla / বাংলা)</label>
                        <input type="text" name="name_bn" class="form-control @error('name_bn') is-invalid @enderror" 
                               value="{{ old('name_bn') }}" placeholder="যেমন: উপদেষ্টা পরিষদ / উপদেষ্টার তালিকা">
                        @error('name_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Display Order / Serial</label>
                        <input type="number" name="order_index" class="form-control" value="{{ old('order_index', 0) }}" min="0">
                        <small class="text-muted">Categories with lower numbers display first.</small>
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Short description...">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="status" value="1" class="custom-control-input" id="statusCheck" checked>
                            <label class="custom-control-label font-weight-bold" for="statusCheck">Active Category</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block font-weight-bold text-white">
                        <i class="fa fa-check mr-1"></i> Save Category
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Category List Table -->
    <div class="col-lg-8 col-md-7">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <span class="font-weight-bold"><i class="fa fa-list mr-1"></i> All Member Categories</span>
                <span class="badge badge-light text-dark font-weight-bold">{{ $categories->total() }} Total</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 60px;">Order</th>
                                <th>Name &amp; Slug</th>
                                <th>Bangla Name</th>
                                <th>Members</th>
                                <th>Status</th>
                                <th class="text-right" style="width: 140px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td class="font-weight-bold text-center align-middle">
                                        <span class="badge badge-secondary">{{ $category->order_index }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="font-weight-bold text-dark">{{ $category->name }}</div>
                                        <code class="small text-muted">{{ $category->slug }}</code>
                                    </td>
                                    <td class="align-middle">
                                        <span class="text-primary font-weight-bold">{{ $category->name_bn ?: '—' }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('admin.members.index', ['category_id' => $category->id]) }}" 
                                           class="badge badge-info p-2 font-weight-bold" title="View members in this category">
                                            <i class="fa fa-users mr-1"></i> {{ $category->members_count }} Members
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('admin.member_categories.toggle_status', $category->id) }}" 
                                           class="badge {{ $category->status ? 'badge-success' : 'badge-secondary' }} p-1"
                                           title="Click to toggle status">
                                            {{ $category->status ? 'Active' : 'Inactive' }}
                                        </a>
                                    </td>
                                    <td class="text-right align-middle">
                                        <a href="{{ route('admin.member_categories.edit', $category->id) }}" 
                                           class="btn btn-sm btn-info text-white" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.member_categories.destroy', $category->id) }}" 
                                              method="POST" class="d-inline-block"
                                              onsubmit="return confirm('Are you sure you want to delete this category? Members in this category will not be deleted.');">
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
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i class="fa fa-folder-open-o fa-2x mb-2 d-block"></i>
                                        No member categories found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($categories->hasPages())
                <div class="card-footer bg-white d-flex justify-content-end">
                    {{ $categories->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
