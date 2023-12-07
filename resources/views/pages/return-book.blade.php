@extends('layouts.backend')
@section('title', 'Book Return')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="my-50 text-center">
            <h2 class="font-w700 text-black mb-10">Books Return Form</h2>
            <h3 class="h5 text-muted mb-0">Plugin Integration</h3>
        </div>
    </div>
    <div class="row justify-content-center py-20">
        <div class="col-xl-6">
            <!-- jQuery Validation functionality is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js -->
            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
            <div class="mt-5">
                @if (session('message'))
                    <div class="alert {{ session('alert-class') }}">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <form class="js-validation-bootstrap" action="/book-rent" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="user">User <span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <select class="js-select2 form-control" name="user_id" id="user" class="form-control">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->username }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="book">Book <span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                        <select class="js-select2 form-control" id="book" name="book_id[]" data-placeholder="Choose at least one category.." multiple>
                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-8 ml-auto">
                        <button type="submit" class="btn btn-alt-primary w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Page Content -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.inputbox').select2();
    });
    </script>
@endsection
