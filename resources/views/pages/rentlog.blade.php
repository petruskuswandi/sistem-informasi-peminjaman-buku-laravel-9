@extends('layouts.backend')
@section('title')
    Halaman Rent Log
@endsection
@section('css_before')
    <link rel="stylesheet" href="{{ asset('js/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/slick/slick-theme.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/slick/slick.min.js') }}"></script>

    <!-- Page JS Helpers (Slick Slider Plugin) -->
    <script>jQuery(function(){ Codebase.helpers('slick'); });</script>
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="my-50 text-center">
            <h2 class="font-w700 text-black mb-10">DataTables Rent Logs</h2>
            <h3 class="h5 text-muted mb-0">Plugin Integration</h3>
        </div>
        <div class="my-5">
            <x-rent-log-table :rentlog='$rent_logs' />
        </div>
    </div>
    <!-- END Page Content -->
@endsection
