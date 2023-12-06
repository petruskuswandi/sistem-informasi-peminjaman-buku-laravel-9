@extends('layouts.backend')
@section('title')
    Halaman Book
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
        <div class="my-50 text-center">
            <h2 class="font-w700 text-black mb-10">DataTables Books</h2>
            <h3 class="h5 text-muted mb-0">Plugin Integration</h3>
        </div>

        <div class="mt-5 d-flex justify-content-end">
            <a href="/book-deleted" class="btn btn-secondary" style="margin-right: 10px">View Deleted Data</a>
            <a href="/book-add" class="btn btn-primary">Add Data</a>
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
                        <th class="text-center">Code</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->book_code }}</td>
                            <td class="text-center">{{ $item->title }}</td>
                            <td class="text-center">
                                @foreach ($item->categories as $category)
                                    {{ $category->name }} <br>
                                @endforeach
                            </td>
                            <td class="text-center">{{ $item->status }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="/book-edit/{{ $item->slug }}">
                                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </a>
                                    <a href="/book-delete/{{ $item->slug }}">
                                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-times"></i>
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
