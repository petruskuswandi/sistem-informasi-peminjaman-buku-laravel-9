@extends('layouts.backend')
@section('title')
    Halaman Banned User List
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded mb-0">
            <div class="block-content block-content-full">
                <div class="py-3 text-center">
                    <h1 class="h3 fw-extrabold mb-1">
                        Banned Users List
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
                    @if (count($bannedUsers) < 1)
                        <tr>
                            <td colspan="6" style="text-align: center">No Data</td>
                        </tr>
                    @endif
                    @foreach ($bannedUsers as $item)
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
                                    <a href="/user-restore/{{ $item->slug }}">
                                        <button type="button" class="btn btn-sm btn-alt-primary js-bs-tooltip-enabled"
                                            data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                                            <i class="fa fa-undo"></i>
                                            Restore
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
