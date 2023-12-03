@extends('layouts.backend')
@section('title')
    Halaman Registered User
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded mb-0">
            <div class="block-content block-content-full">
                <div class="py-3 text-center">
                    <h1 class="h3 fw-extrabold mb-1">
                        New Registered Users List
                    </h1>
                </div>
            </div>
        </div>
        @if (session('deleteStatus'))
            <div class="mt-3 block block-rounded">
                <div class="alert alert-danger">
                    {{ session('deleteStatus') }}
                </div>
            </div>
        @elseif (session('status'))
            <div class="mt-3 block block-rounded">
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            </div>
        @endif
        <div class="mt-3 block block-rounded">
            <div class="block-header block-header-default d-flex justify-content-end">
                <div class="block-options" style="gap: 16px">
                    <a href="/users-add">
                        <button type="button" class="btn btn-danger">
                            View Banned User</button>
                    </a>
                    <a href="/registered-users">
                        <button type="button" class="btn btn-primary">
                            New Registered User</button>
                    </a>
                </div>
            </div>
            <table class="table table-hover table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">No. </th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th class="text-center" style="width: 200px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($registeredUsers) < 1)
                        <tr>
                            <td colspan="4" style="text-align: center">No Data</td>
                        </tr>
                    @endif
                    @foreach ($registeredUsers as $item)
                        <tr>
                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->username }}</td>
                            <td>
                                @if ($item->phone)
                                    {{ $item->phone }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group" style="gap: 8px">
                                    <a href="/user-detail/{{ $item->slug }}">
                                        <button type="button" class="btn btn-sm btn-alt-warning js-bs-tooltip-enabled"
                                            data-bs-toggle="tooltip" aria-label="Detail" data-bs-original-title="Detail">
                                            <i class="fa fa-user"></i>
                                            Detail
                                        </button></a>
                                    <a href="/user-ban/{{ $item->slug }}">
                                        <button type="button" class="btn btn-sm btn-alt-danger js-bs-tooltip-enabled"
                                            data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                                            <i class="fa fa-times"></i>
                                            Ban User
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
