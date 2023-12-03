@extends('layouts.backend')
@section('title')
    Halaman Dashboard
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        {{-- book statistic --}}
        <div class="row d-flex justify-content-between">
            <div class="col-6 col-xl-4">
                <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-book fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold">{{ $book_count }}</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Books</div>
                        </div>
                    </div>
                </a>
            </div>
            {{-- end of book stats --}}

            {{-- category stats --}}
            <div class="col-6 col-xl-4">
                <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-list fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold">{{ $category_count }}</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Category</div>
                        </div>
                    </div>
                </a>
            </div>
            {{-- end of category stats --}}

            {{-- users statistic --}}
            <div class="col-6 col-xl-4">
                <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-users fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold">{{ $user_count }}</div>
                            <div class="fs-sm fw-semibold text-uppercase text-muted">Users</div>
                        </div>
                    </div>
                </a>
            </div>
            {{-- end of users statistic --}}
        </div>

        <div class="mt-5">
            <h2>Rent Log</h2>

            <div class="block block-rounded">
                <table class="table table-hover table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">No.</th>
                            <th>Users</th>
                            <th>Book Title</th>
                            <th>Rent Date</th>
                            <th>Return Date</th>
                            <th>Actual Return Date</th>
                            <th>Status</th>
                            {{-- <th class="text-center" style="width: 100px;">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" style="text-align: center">No Data</td>
                        </tr>
                        {{-- <tr>
                            <th class="text-center" scope="row">1</th>
                            <td>Brian Cruz</td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-warning">Trial</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-secondary js-bs-tooltip-enabled"
                                        data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary js-bs-tooltip-enabled"
                                        data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="my-50 text-center">
            <h2 class="font-w700 text-black mb-10">Dashboard</h2>
            <h3 class="h5 text-muted mb-0">Welcome to your app.</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-5">
                <div class="block">
                    <div class="block-content">
                        <p class="text-muted">
                            We’ve put everything together, so you can start working on your Laravel project as soon as
                            possible! Codebase assets are integrated and work seamlessly with Laravel Mix, so you can use
                            the npm scripts as you would in any other Laravel project.
                        </p>
                        <p class="text-muted">
                            Feel free to use any examples you like from the full versions to build your own pages.
                            <strong>Wish you all the best and happy coding!</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- END Page Content -->
@endsection
