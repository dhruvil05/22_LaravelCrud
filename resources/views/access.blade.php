@extends('layouts.main')
@push('title')
    <title>LaravelCRUD</title>
@endpush
@section('main.section')
    <div class="container d-flex justify-content-center align-items-center" style="height: 300px">
        <div class="row">
            <div class="col-md-12">
                <div class="comtainer ">
                    <p>you're not allowed to access the page. please <a class="" href="{{ url('students/set-session') }}">Login</a> first.</p>

                </div>
            </div>
        </div>
    </div>
@endsection
