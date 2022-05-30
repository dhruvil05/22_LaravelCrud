@extends('layouts.main')
@push('title')
    <title>LaravelCRUD</title>
@endpush
@section('main.section')
    {{-- <div class="btn-register my-4">

        <a href="register" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Register</a>
    </div> --}}


    <div class="session my-2">
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        @if (session('failed'))
            <h6 class="alert alert-danger">{{ session('failed') }}</h6>
        @endif
    </div>

    <div class="container my-3">
        <div class="row">

            <h4>Laravel CRUd</h4>
            <form action="" class="col-9" style="margin: auto">
                <div class="form-group d-flex justify-content-center">
                    <input type="search" name="search" id="" class="form-control mr-2" placeholder="Search by "
                        style="width: 25%" value="{{ $search }}" />
                    <button class="btn btn-primary mr-2">Search</button>
                    <a href="{{ url('students') }}">
                        <button class="btn btn-primary " type="button">Reset</button>
                    </a>
                </div>

            </form>
            <div class="create">
                <a href="{{ url('students/add-student') }}" class="btn btn-primary float-right">Add Student</a>
            </div>

        </div>

    </div>

    {{-- <div class="display my-4"> --}}

    <div class="table-responsive">
        <div class="row pl-3">
            {{ $student->links() }}
            @if ($page == '')
                <p class="page">1</p>
            @else
                <p class="page">{{ $page }}</p>
            @endif
        </div>
        <table class="table table-bordered table-striped my-4 yajra-datatable" style="">
            <thead>
                <tr>

                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Fav_Sport</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Hobby</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>

        <div class="row pl-3">
            {{ $student->links() }}
            @if ($page == '')
                <p class="page">1</p>
            @else
                <p class="page">{{ $page }}</p>
            @endif

        </div>
    </div>
@endsection
