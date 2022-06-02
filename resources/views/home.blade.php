@extends('layouts.main')
@push('title')
    <title>LaravelCRUD</title>
@endpush
@push('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@push('link')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="https://cdn.datatables.net/rowgroup/1.1.1/css/rowGroup.bootstrap4.min.css" />
@endpush
@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
@endpush
@section('main.section')
    <div class="session my-2">
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        @if (session('failed'))
            <h6 class="alert alert-danger">{{ session('failed') }}</h6>
        @endif

        {{-- <p>{{session('user')}}</p>
        <p>{{session('id')}}</p> --}}


    </div>
    <div class="container my-3">
        <div class="row d-flex justify-content-between">

            <h4>Laravel CRUd</h4>

            <div class="search">
                <input type="search" name="searchIn" class="form-control search" placeholder="Search">
            </div>

            <div class="create">
                <a href="{{ url('students/add-student') }}" class="btn btn-primary float-right">Add Student</a>
            </div>

        </div>

    </div>
    <table class="table table-bordered table-responsive data-table">
        <thead>
            <tr>

                <th>Name</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Favsport</th>
                <th>Country</th>
                <th>State</th>
                <th>Address</th>
                <th>Image</th>
                <th>Hobby</th>
                <th>Created_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection
@push('script')
    <script type="text/javascript">
        $(function() {

            var table = $('.data-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                searching:false,
                "order": [
                    [11, "desc"]
                ],

                ajax: {
                    url: "{{ url('students') }}",

                    data: function(d) {
                        // d.string = $('.search').val(),
                        d.search = $('input[type="search"]').val()
                    }
                },
                columns: [

                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'dob',
                        name: 'dob',

                    },
                    {
                        data: 'gender',
                        name: 'gender'

                    },
                    {
                        data: 'favsport',
                        name: 'favsport',
                      
                    },
                    {
                        data: 'country',
                        name: 'country'
                    },
                    {
                        data: 'state',
                        name: 'state'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false,
                        render: function(data) {
                            return "<img src=\"http://127.0.0.1:8000/uploads/cover/" + data +
                                "\" height=\"50px\"/>";
                        }
                    },
                    {
                        data: 'hobby',
                        name: 'hobby',


                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $(".search").keyup(function() {
                // console.log($('.search').val());
                table.draw();
            });

        });
    </script>
@endpush
