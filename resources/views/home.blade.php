@extends('layouts.main')
@push('title')
    <title>LaravelCRUD</title>
@endpush
@section('main.section')
    {{-- <div class="btn-register my-4">

        <a href="register" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Register</a>
    </div> --}}


    <div class="container my-2">
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        @if (session('failed'))
            <h6 class="alert alert-danger">{{ session('failed') }}</h6>
        @endif
    </div>
    <div class="container my-3">
        <div class="row d-flex justify-content-between">

            <h4>Laravel CRUd</h4>
            <form action="" class="col-7 d-flex justify-content-center" style="margin: auto">
                <div class="form-group d-flex justify-content-end">
                    <input type="search" name="search" id="" class="form-control mr-2" placeholder="Search by "
                        value="{{ $search }}" />
                    <button class="btn btn-primary mr-2">Search</button>
                    <a href="{{ url('students') }}">
                        <button class="btn btn-primary " type="button">Reset</button>
                    </a>
                </div>

            </form>
            <div class="">

                <a href="{{ url('student/add-student') }}" class="btn btn-primary float-right">Add Student</a>
                <a href="{{ url('students/trash') }}" class="btn btn-danger float-right mr-3">Go To Trash</a>
            </div>
        </div>
    </div>

    <div class="display my-4" >

        <div class="row pl-3" >
            {{ $student->links() }}
            @if ($page == ""  )
                <p class="page">1</p>
            @else
                <p class="page">{{ $page }}</p>
            @endif
        </div>
        <table class="table table-bordered table-striped">
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
                @foreach ($student as $item)
                    <tr>

                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ get_formatter_gender($item->gender) }}
                            {{-- @if ($item->gender == 'M')
                                {{ 'Male' }}
                            @elseif ($item->gender =='F')
                                {{ 'Female' }}
                            @else
                                {{ 'Other' }}
                            @endif --}}
                        </td>
                        <td>
                            {{ get_formatted_date($item->dob, 'd/m/Y') }}
                            {{-- {{ $item->dob }} --}}
                        </td>
                        <td>{{ $item->fav_sport }}</td>
                        <td>{{ $item->country }}</td>
                        <td>{{ $item->state }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <img src="{{ asset('uploads/cover/' . $item->image) }}" width="70px" height="70px"
                                alt="Image">
                        </td>
                        <td>{{ $item->hobby }}</td>
                        <td class="action">
                            <a href="{{ url('student/edit-student/' . $item->id) }}"
                                class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ url('trash-student/' . $item->id) }}" onclick="return confirm('move to Trash?')"
                                class="btn btn-danger btn-sm">Trash</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row pl-3">
            {{ $student->links() }}

            @if ($page =="")
                <p class="page">1</p>
            @else
                <p class="page">{{ $page }} </p>
            @endif

        </div>
    </div>
@endsection
