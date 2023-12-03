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
                        Detail User
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
        @if ($user->status == 'inactive')
            <div class="block-header d-flex justify-content-end">
                <a href="/user-approve/{{ $user->slug }}">
                    <button type="button" class="btn btn-success">
                        Approve User</button>
                </a>
            </div>
        @endif
        <div class="mt-3 block block-rounded">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Form Detail User</h3>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center py-sm-3 py-md-5">
                        <div class="col-sm-10 col-md-8">
                            {{-- form component --}}
                            <div class="mb-4">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" class="form-control form-control-alt" id="username" name="username"
                                    placeholder="Enter Username..." value="{{ $user->username }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="text" class="form-control form-control-alt" id="phone" name="phone"
                                    placeholder="Enter Phone..." value="{{ $user->phone }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="address">Address</label>
                                <textarea type="text" class="form-control form-control-alt" id="address" name="address"
                                    placeholder="Enter Address..." cols="30" rows="5" style="resize: none">{{ $user->address }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="status">Status</label>
                                <input type="text" class="form-control form-control-alt" id="status" name="status"
                                    placeholder="Your Status..." value="{{ $user->status }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
