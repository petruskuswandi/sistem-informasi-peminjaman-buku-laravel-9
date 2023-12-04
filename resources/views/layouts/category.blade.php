@extends('layouts.backend')
@section('title')
    Halaman Category
@endsection
@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded mb-0">
            <div class="block-content block-content-full">
                <div class="py-3 text-center">
                    <h1 class="h3 fw-extrabold mb-1">
                        Category List
                    </h1>
                </div>
            </div>
        </div>
        @if (session('deleteStatus'))
            <div class="mt-3 block block-rounded">
                <div class="alert alert-danger">
                    {{ session('deleteStatus') }}
                </div>
            </div>
        @elseif (session('status'))
            <div class="mt-3 block block-rounded">
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            </div>
        @endif
        <div class="mt-3 block block-rounded">
            <div class="block-header block-header-default d-flex justify-content-end">
                <div class="block-options">
                    <a href="/category-add">
                        <button type="button" class="btn btn-primary"><i class="fa fa-plus opacity-50 me-1"></i>
                            Add Data</button>
                    </a>
                </div>
            </div>
            <table class="table table-hover table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 100px;">No.</th>
                        <th>Name</th>
                        <th class="text-center" style="width: 200px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($categories) < 1)
                        <tr>
                            <td colspan="3" style="text-align: center">No Data</td>
                        </tr>
                    @endif
                    @foreach ($categories as $item)
                        <tr>
                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td class="text-center">
                                <div class="btn-group" style="gap: 8px">
                                    <a href="/category-edit/{{ $item->slug }}">
                                        <button type="button" class="btn btn-sm btn-alt-warning js-bs-tooltip-enabled"
                                            data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                            Edit
                                        </button></a>
                                    <a href="/category-delete/{{ $item->slug }}">
                                        <button type="button" class="btn btn-sm btn-alt-danger js-bs-tooltip-enabled"
                                            data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                                            <i class="fa fa-times"></i>
                                            Delete
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection
