@extends('layouts.backend')
@section('title')
    Halaman User List
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
            <h2 class="font-w700 text-black mb-10">DataTables Users</h2>
            <h3 class="h5 text-muted mb-0">Plugin Integration</h3>
        </div>

        <div class="mt-5 d-flex justify-content-end">
            <a href="/user-banned" class="btn btn-secondary" style="margin-right: 10px">View Banned User</a>
            <a href="/registered-users" class="btn btn-primary">New Registered User</a>
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
                        <th class="text-center">Username</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->username }}</td>
                            <td class="text-center">{{ $item->phone }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="/user-detail/{{ $item->slug }}">
                                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Detail">
                                            <i class="fa fa-info"></i>
                                        </button>
                                    </a>
                                    <a href="/user-ban/{{ $item->slug }}">
                                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Ban User">
                                            <i class="fa fa-ban"></i>
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
