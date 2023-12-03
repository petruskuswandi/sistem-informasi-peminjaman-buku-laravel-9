@extends('layouts.backend')
@section('title')
    Add Book
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
        <form action="books-add" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Form Add Book</h3>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center py-sm-3 py-md-5">
                        <div class="col-sm-10 col-md-8">
                            <div class="mb-4">
                                <label class="form-label" for="code">Code</label>
                                <input type="text" class="form-control form-control-alt" id="code" name="book_code"
                                    placeholder="Enter book code..." value="{{ old('book_code') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" class="form-control form-control-alt" id="title" name="title"
                                    placeholder="Enter book title..." value="{{ old('title') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="image">Cover Image</label>
                                <input class="form-control form-control-alt"type="file" id="image" name="image"
                                    placeholder="Upload Cover Image...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light text-end">
                    <button type="reset" class="btn btn-alt-secondary">
                        <i class="fa fa-sync-alt opacity-50 me-1"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-alt-primary">
                        <i class="fa fa-check opacity-50 me-1"></i> Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- END Page Content -->
@endsection
