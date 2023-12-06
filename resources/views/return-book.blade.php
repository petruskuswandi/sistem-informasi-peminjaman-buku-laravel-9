@extends('layouts.backend')
@section('title', 'Book Return')
    
@section('content')
    <!-- Page Content -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="col-12 col-md-6 offset-md-2 col-lg-6 offset-md-3">
        <h1 class="mb-5">Book Return Form</h1>
        
        <div class="mt-5">
            @if (session('message'))
                <div class="alert {{ session('alert-class') }}">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <form action="book-return" method="post">
            @csrf
            <div class="mb-3">
                <label for="user" class="form-label">User</label>
                <select name="user" id="user" class="form-control inputbox">
                    <option value="">Select User</option>
                    @foreach ($users as $item )
                        <option value="{{ $item->id }}">{{ $item->username }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="book" class="form-label">Book</label>
                <select name="book" id="book" class="form-control inputbox">
                    <option value="">Select Book</option>
                    @foreach ($books as $item )
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            
            
         </form> 
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