@extends('layouts.backend')
@section('title')
    Halaman Category
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded mb-0">
            <div class="block-content block-content-full">
                <div class="py-3 text-center">
                    <h1 class="h3 fw-extrabold mb-1">
                        Category List
                    </h1>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="mt-3 block block-rounded">
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            </div>
        @endif
        <div class="mt-3 block block-rounded">
            <div class="block-header block-header-default d-flex justify-content-end">
                <div class="block-options">
                    <a href="/category-add">
                        <button type="button" class="btn btn-sm btn-primary">Add Data</button>
                    </a>
                </div>
            </div>
            <table class="table table-hover table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 100px;"></th>
                        <th>Name</th>
                        <th class="text-center" style="width: 200px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-secondary js-bs-tooltip-enabled"
                                        data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary js-bs-tooltip-enabled"
                                        data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                                        <i class="fa fa-times"></i>
                                    </button>
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
