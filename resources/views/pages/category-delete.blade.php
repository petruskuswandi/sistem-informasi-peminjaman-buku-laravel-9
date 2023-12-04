@extends('layouts.backend')
@section('title')
    Halaman Delete Kategori
@endsection
@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection
@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Are you sure want to delete "{{ $category->name }}" Category ? </h3>
            </div>
            <div class="block-content block-content-full">
                <div class="btn-group" style="gap: 8px">
                    <a href="/categories">
                        <button type="button" class="btn btn-alt-secondary js-bs-tooltip-enabled"
                            data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                            Cancel
                        </button></a>
                    <a href="/category-destroy/{{ $category->slug }}">
                        <button type="button" class="btn btn-alt-danger js-bs-tooltip-enabled"
                            data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                            Delete
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
