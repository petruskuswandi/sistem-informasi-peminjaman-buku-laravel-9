@extends('layouts.backend')
@section('title')
    Halaman Add Buku
@endsection
@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.css') }}">

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">
@endsection
@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>

    {{-- <script src="{{ asset('assets/js/codebase.core.min.js') }}"></script> --}}

    <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery-validation/additional-methods.js') }}"></script>

    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function () { Codebase.helpers('select2'); });</script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_forms_validation.min.js') }}"></script>
@endsection
@section('content')
<div class="content">
    <div class="my-50 text-center">
        <h2 class="font-w700 text-black mb-10">Book Add Form</h2>
        <h3 class="h5 text-muted mb-0">Plugin Integration</h3>
    </div>
    <div class="row justify-content-center py-20">
        <div class="col-xl-6">
            <!-- jQuery Validation functionality is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js -->
            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="js-validation-bootstrap" action="/book-add" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="code">Book Code <span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="code" name="book_code" placeholder="Enter a book's code.." value="{{ old('book_code') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="title">Title <span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter a book's title.." value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="image">Image <span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="category">Category <span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <select class="js-select2 form-control" id="category" name="categories[]" style="width: 100%;" data-placeholder="Choose at least one category.." multiple>
                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-8 ml-auto">
                        <button type="submit" class="btn btn-alt-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
