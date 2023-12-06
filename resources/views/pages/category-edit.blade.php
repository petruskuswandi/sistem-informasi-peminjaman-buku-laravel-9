@extends('layouts.backend')
@section('title')
    Halaman Edit Kategori
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

    <script src="{{ asset('assets/js/codebase.core.min.js') }}"></script>

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
            <form class="js-validation-bootstrap" action="/category-edit/{{ $category->slug }}" method="post">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="category-name">Category Name <span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="category-name" name="name" placeholder="Enter a category name.." value="{{ $category->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-8 ml-auto">
                        <button type="submit" class="btn btn-alt-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
