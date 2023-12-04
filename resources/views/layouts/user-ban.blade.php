@extends('layouts.backend')
@section('title')
    Ban User
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Are you sure want to ban {{ $user->username }} ? </h3>
            </div>
            <div class="block-content block-content-full">
                <div class="btn-group" style="gap: 8px">
                    <a href="/users">
                        <button type="button" class="btn btn-alt-secondary js-bs-tooltip-enabled"
                            data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                            Cancel
                        </button></a>
                    <a href="/user-destroy/{{ $user->slug }}">
                        <button type="button" class="btn btn-alt-danger js-bs-tooltip-enabled"
                            data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                            Delete
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
