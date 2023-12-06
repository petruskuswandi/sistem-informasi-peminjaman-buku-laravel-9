@extends('layouts.backend')
@section('title')
    Halaman Detail User List
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
            <h2 class="font-w700 text-black mb-10">DataTables New Registered User List</h2>
            <h3 class="h5 text-muted mb-0">Plugin Integration</h3>
        </div>

        <div class="mt-5 d-flex justify-content-end">
            @if ($user->status == 'inactive')
                <a href="/user-approve/{{ $user->slug }}" class="btn btn-info">Approve User</a>
            @endif
        </div>
        <div class="mt-5">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="my-5" w-25>
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" class="form-control" readonly value="{{ $user->username }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone</label>
                <input type="text" class="form-control" readonly value="{{ $user->phone }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <textarea name="" id="" cols="30" rows="7" class="form-control" style="resize: none" readonly>{{ $user->address }}</textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Status</label>
                <input type="text" class="form-control" readonly value="{{ $user->status }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">User's Rent Log</label>
                <x-rent-log-table :rentlog='$rent_logs' />
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
