@extends('layouts.backend')
@section('title')
    Tambah Category
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/category-edit/{{ $category->slug }}" method="POST">
            @csrf
            @method('put')
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Form Add Category</h3>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center py-sm-3 py-md-5">
                        <div class="col-sm-10 col-md-8">
                            <div class="mb-4">
                                <label class="form-label" for="name">Category Name</label>
                                <input type="text" class="form-control form-control-alt" id="name" name="name"
                                    placeholder="Enter category name..." value="{{ $category->name }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light text-end">
                    <button type="reset" class="btn btn-alt-secondary">
                        <i class="fa fa-sync-alt opacity-50 me-1"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-alt-primary">
                        <i class="fa fa-check opacity-50 me-1"></i> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- END Page Content -->
@endsection
