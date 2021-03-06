<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    @stack('title')
    <style>
        .select {
            width: 550px;
            height: 35px;
        }

        .action {
            display: flex;
            flex-direction: column;
        }

        .action>a {
            margin-bottom: 5px;
        }

        label {
            font-weight: bold;
        }

        .btns {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
        }

        .back {
            height: 60px;
        }

        th {
            text-align: center;
        }

        tr>td {
            font-size: 12px;
        }

        .page {
            width: 50px;
            height: 30px;
            display: flex;
            justify-content: center;
            border: 2px solid black;
            border-radius: 20px;
            margin-left: 5px;
        }

        /* table {
            position: relative;
            right: 62px;
        } */

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('students') }}">
            @if (session()->has('user'))
                {{ session()->get('user') }}
            @else
                Guest
            @endif
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('students') }}">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('students/add-student') }}">Register</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Session Demo link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        {{-- <a class="dropdown-item" href="{{ url('students/get-all-session') }}">allSession</a> --}}
                        <a class="dropdown-item" href="{{ url('students/set-session') }}">Login</a>
                        <a class="dropdown-item" href="{{ url('students/destroy-session') }}">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
  
