@extends('layouts.backend')
@section('title')
    Halaman Deleted Kategori List
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
        <h2 class="content-heading">Category <small>List</small></h2>
        <div class="mt-5 d-flex justify-content-end">
            <a href="/categories" class="btn btn-primary">Back</a>
        </div>
        <div class="mt-5">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="my-5">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deletedCategories as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="/category-restore/{{ $item->slug }}">
                                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Restore">
                                            <i class="fa fa-undo"></i>
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
