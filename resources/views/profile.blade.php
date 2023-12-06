@extends('layouts.backend')
@section('title')
    Halaman Profile
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
    {{-- <div class="content">
        <div class="my-50 text-center">
            <h2 class="font-w700 text-black mb-10">DataTables Your Rent Logs</h2>
            <h3 class="h5 text-muted mb-0">Plugin Integration</h3>
        </div>
        <div class="my-5">
            <x-rent-log-table :rentlog='$rent_logs' />
        </div>
    </div> --}}
    <div class="mt-5">
        <h1>Your Rent Log</h1>
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>
    <!-- END Page Content -->
@endsection
