@extends('layouts.main')
@section('title')
    Halaman Book List
@endsection
@section('header')
    <header id="page-header" class="invisible" data-toggle="appear" data-class="animated fadeInDown">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="content-header-section">
                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700 mr-5" href="/">
                        <i class="si si-fire text-primary"></i>
                        <span class="font-size-h4 text-dual-primary-dark">Creative</span><span class="font-size-h4 text-primary">PRS</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="content-header-section">
                <a class="btn btn-sm btn-hero btn-noborder btn-alt-primary px-20 mr-5" href="/login">
                    <i class="si si-rocket"></i> <span class="ml-5 d-none d-sm-inline-block">Login</span>
                </a>
                <a class="btn btn-sm btn-hero btn-noborder btn-alt-success px-20" href="/register">
                    <i class="si si-bag"></i> <span class="ml-5 d-none d-sm-inline-block">Register</span>
                </a>
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->
    </header>
@endsection
@section('content')
    <!-- Unlimited Dashboards -->
    <div class="bg-white">
        <div class="content content-full">
            <div class="pt-100 pb-50">
                <div class="position-relative">
                    <span class="text-back">01</span>
                    <h2 class="font-w700 mb-10 text-center">
                        Book's <span class="text-primary">List</span>
                    </h2>
                    <h3 class="h4 font-w400 text-muted text-center mb-50">
                        Book Rent with Creative PRS.
                    </h3>
                </div>
                <form action="" method="GET" class="mb-4">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <select name="category" id="category" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="input-group mb-3">
                                <input type="text" name="title" class="form-control" placeholder="Search book's title">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row nice-copy my-10">
                    @foreach ($books as $item)
                        <div class="col-md-4 py-20">
                            <a class="options-container push" href="be_pages_dashboard.html">
                                <img class="img-fluid options-item" src="{{ $item->cover !== '' ? asset('storage/cover/'.$item->cover) : asset('images/cover-not-found.jpeg') }}" alt="{{ $item->cover }}">
                                <div class="options-overlay bg-white-op-90">
                                    <div class="options-overlay-content h5 font-w700 text-uppercase">
                                        <i class="fa fa-link fa-4x"></i>
                                    </div>
                                </div>
                            </a>
                            <h4 class="font-size-xl font-w700 mb-10">
                                <span class="text-uppercase">{{ $item->book_code }}</span>
                            </h4>
                            <p>
                                {{ $item->title }}
                            </p>
                            <p class="{{ $item->status == 'in stock' ? 'text-success font-weight-bold' : 'text-danger font-weight-bold' }}">{{ $item->status }}</p>
                        </div>
                    @endforeach
                </div>
                @guest
                    <div class="text-center">
                        <a class="btn btn-hero btn-noborder btn-alt-secondary min-width-175" href="/register">
                            <i class="si si-rocket mr-5"></i> Register
                        </a>
                    </div>
                @else
                    @if (Auth::user()->role_id == 1)
                        <div class="text-center">
                            <a class="btn btn-hero btn-noborder btn-alt-secondary min-width-175" href="/dashboard">
                                <i class="si si-rocket mr-5"></i> Explore More Dashboards
                            </a>
                        </div>
                    @elseif (Auth::user()->role_id == 2)
                        <div class="text-center">
                            <a class="btn btn-hero btn-noborder btn-alt-secondary min-width-175" href="/profile">
                                <i class="si si-rocket mr-5"></i> Go to Profile
                            </a>
                        </div>
                    @endif
                @endguest
            </div>
        </div>
    </div>
    <!-- END Unlimited Dashboards -->
@endsection
