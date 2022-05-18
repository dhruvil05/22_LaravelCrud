<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Laravel 8 CRUD Tutorial From Scratch</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Laravel 8 CRUD Example Tutorial</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('student.create') }}"> Create Student</a>
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
<th>Student Contact</th>
<th>Student DOB</th>
<th>Student Country</th>
<th>Student FavSport</th>
<th>Student Image</th>
<th>Student Address</th>
<th>Student CreatedAt</th>
<th>Student UpdatedAt</th>
<th width="280px">Action</th>
</tr>
@foreach ($companies as $students)
<tr>
<td>{{ $students->id }}</td>
<td>{{ $students->name }}</td>
<td>{{ $students->email }}</td>
<td>{{ $students->contact }}</td>
<td>{{ $students->dateOfBirth }}</td>
<td>{{ $students->country }}</td>
<td>{{ $students->favSport }}</td>
<td>{{ $students->image }}</td>
<td>{{ $students->address }}</td>
<td>{{ $students->created_at }}</td>
<td>{{ $students->updated_at }}</td>
<td>
<form action="{{ route('companies.destroy',$students->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('companies.edit',$students->id) }}">Edit</a>
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