@extends('admin.master')

@section('title', ' - Edit Member Category')

@section('body')
<div class="row page-titles">
    <div class="col-md-6 align-self-center">
        <h4 class="text-themecolor font-weight-bold">
            <i class="fa fa-pencil-square-o text-theme-colored mr-2"></i> Edit Member Category
        </h4>
    </div>
    <div class="col-md-6 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.member_categories.index') }}">Categories</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
            <a href="{{ route('admin.member_categories.index') }}" class="btn btn-secondary font-weight-bold ml-2">
                <i class="fa fa-arrow-left mr-1"></i> Back to Categories
            </a>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white font-weight-bold">
                <i class="fa fa-edit mr-1"></i> Edit Category: {{ $category->name }}
            </div>
            <div class="card-body">
                <form action="{{ route('admin.member_categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Category Name (English) <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name', $category->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Category Name (Bangla / বাংলা)</label>
                        <input type="text" name="name_bn" class="form-control @error('name_bn') is-invalid @enderror" 
                               value="{{ old('name_bn', $category->name_bn) }}">
                        @error('name_bn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Slug (Identifier)</label>
                        <input type="text" class="form-control bg-light" value="{{ $category->slug }}" readonly disabled>
                        <small class="text-muted">Slug is automatically generated and immutable.</small>
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Display Order / Serial</label>
                        <input type="number" name="order_index" class="form-control" value="{{ old('order_index', $category->order_index) }}" min="0">
                        <small class="text-muted">Categories with lower numbers display first.</small>
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $category->description) }}</textarea>
                    </div>

                    <div class="form-group mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="status" value="1" class="custom-control-input" id="statusCheck" {{ $category->status ? 'checked' : '' }}>
                            <label class="custom-control-label font-weight-bold" for="statusCheck">Active Category</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.member_categories.index') }}" class="btn btn-outline-secondary">
                            <i class="fa fa-times mr-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-success font-weight-bold text-white px-4">
                            <i class="fa fa-save mr-1"></i> Update Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
