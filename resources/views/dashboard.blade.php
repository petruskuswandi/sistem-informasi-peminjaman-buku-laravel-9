@extends('layouts.backend')
@section('title')
    Halaman Dashboard
@endsection
@section('css_before')
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection
@section('css_after')
    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
    <script src="{{ asset('assets/js/plugins/jquery-vide/jquery.vide.min.js') }}"></script>
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Hero -->
        <!-- jQuery Vide for video backgrounds, for more examples you can check out https://github.com/VodkaBears/Vide -->
        <div class="block block-transparent bg-video" data-vide-bg="{{ asset('assets/media/videos/city_night.mp4') }}" data-vide-options="posterType: jpg">
            <div class="block-content bg-primary-dark-op">
                <div class="py-20 text-center">
                    <h1 class="font-w700 text-white mb-10">Dashboard</h1>
                    <h2 class="h4 font-w400 text-white-op">Welcome, {{ Auth::user()->username }}</h2>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Dummy content -->
        <div class="row my-5">
            <div class="col-lg-4">
                <a href="/books" class="card-data book">
                    <div class="row">
                        <div class="col-6"><i class="bi bi-journal-bookmark"></i></div>
                        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                            <div class="card-desc">Books</div>
                            <div class="card-count">{{ $book_count }}</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="/categories" class="card-data category">
                    <div class="row">
                        <div class="col-6"><i class="bi bi-list-task"></i></div>
                        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                            <div class="card-desc">Categories</div>
                            <div class="card-count">{{ $category_count }}</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="/users" class="card-data user">
                    <div class="row">
                        <div class="col-6"><i class="bi bi-people"></i></div>
                        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                            <div class="card-desc">Users</div>
                            <div class="card-count">{{ $user_count }}</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="my-50 text-center">
            <h2 class="font-w700 text-black mb-10">DataTables Rent Logs</h2>
            <h3 class="h5 text-muted mb-0">Plugin Integration</h3>
        </div>
        <div class="my-5">
            <x-rent-log-table :rentlog='$rent_logs' />
        </div>
        <!-- END Dummy content -->
    </div>
    <!-- END Page Content -->
@endsection
