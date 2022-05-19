<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel 8 CRUD Tutorial From Scratch</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 8 CRUD Example Tutorial</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('student.create') }}"> ADD Student</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Student Name</th>
                <th>Student Email</th>
                {{-- <th>Student Contact</th> --}}
                <th>Student DOB</th>
                <th>Student Country</th>
                <th>Student FavSport</th>
                <th>Student Image</th>
                <th>Student Address</th>
                <th>Student CreatedAt</th>
                <th>Student UpdatedAt</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($student as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    {{-- <td>{{ $student->contact }}</td> --}}
                    <td>{{ $student->dateOfBirth }}</td>
                    <td>{{ $student->country }}</td>
                    <td>{{ $student->favSport }}</td>
                    <td>{{ $student->image }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->created_at }}</td>
                    <td>{{ $student->updated_at }}</td>
                    <td>
                        <form action="{{ route('companies.destroy', $student->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('companies.edit', $student->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $student->links() !!}
</body>

</html>
xx
                                                            