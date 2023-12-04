@extends('layouts.main')
@section('title')
    Halaman Book
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
                        <span class="font-size-h4 text-dual-primary-dark">code</span><span class="font-size-h4 text-primary">base</span>
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
    <!-- Hero -->
    <div class="bg-white bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
        <div class="d-flex align-items-center">
            <div class="content content-full">
                <div class="row no-gutters w-100 py-100 overflow-hidden">
                    <div class="col-md-5 py-30 d-flex align-items-center invisible" data-toggle="appear">
                        <div class="text-center text-md-left">
                            <span class="d-inline-block bg-dark text-white rounded-pill py-5 px-15 mb-15 font-w600">v4.0</span>
                            <h1 class="font-w600 font-size-h2 mb-20">
                                Next generation, multipurpose UI framework.
                            </h1>
                            <p class="font-size-lg nice-copy text-muted mb-30">
                                Codebase is a super flexible solution built with Bootstrap 4, ES6 and Sass. Use it to save time and create all kinds of web applications with friendly and fast user interface.
                            </p>
                            <a class="btn btn-hero btn-alt-secondary" href="/login">
                                <i class="fa fa-arrow-right text-muted mr-5"></i> Enter Dashboard
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7 py-30 d-none d-md-flex align-items-md-center justify-content-md-end invisible" data-toggle="appear" data-class="animated fadeInRight">
                        <img class="img-fluid" src="{{ asset('assets/media/various/landing-promo-hero.png') }}" srcset="{{ asset('assets/media/various/landing-promo-hero@2x.png') }} 2x" alt="Hero Promo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <!-- Key Features -->
    <div class="bg-body-light overflow-hidden">
        <div class="content content-full">
            <div class="row no-gutters justify-content-center text-center nice-copy py-50">
                <div class="col-xl-4">
                    <div class="w-100 py-30 invisible" data-toggle="appear" data-class="animated fadeInUp" data-offset="-150">
                        <p>
                            <i class="fa fa-cubes fa-4x text-default"></i>
                        </p>
                        <h4 class="mb-5">
                            Powerful Layout
                        </h4>
                        <p class="text-muted mb-0">
                            Tons of predesigned pages.
                        </p>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="w-100 py-30 invisible" data-toggle="appear" data-class="animated fadeInUp" data-offset="-150" data-timeout="150">
                        <p>
                            <i class="fa fa-code fa-4x text-pulse"></i>
                        </p>
                        <h4 class="mb-5">
                            Laravel Starter Kit
                        </h4>
                        <p class="text-muted mb-0">
                            Super boost your Laravel based project.
                        </p>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="w-100 py-30 invisible" data-toggle="appear" data-class="animated fadeInUp" data-offset="-150" data-timeout="300">
                        <p>
                            <i class="fa fa-rocket fa-4x text-elegance"></i>
                        </p>
                        <h4 class="mb-5">
                            Bootstrap 4, Sass and ES6
                        </h4>
                        <p class="text-muted mb-0">
                            Only the latest tech under the hood.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Key Features -->

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
                        Let your imagination build your idea with Codebase.
                    </h3>
                </div>
                <div class="row nice-copy my-10">
                    @foreach ($books as $item)
                        <div class="col-md-4 py-20">
                            <a class="options-container push" href="be_pages_dashboard.html">
                                <img class="img-fluid options-item" src="{{ asset('images/cover-not-found.jpeg') }}" alt="Dashboard Default">
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
                            <p>{{ $item->status }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <a class="btn btn-hero btn-noborder btn-alt-secondary min-width-175" href="/login">
                        <i class="si si-rocket mr-5"></i> Explore More Dashboards
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Unlimited Dashboards -->
@endsection
