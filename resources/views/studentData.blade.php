<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">All Data</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 1250px">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('add') }}">Add User</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('edituser', ['id' => $data->id]) }}">Edit User</a> href="{{route('edituser',['id'=>$data->id])}}"
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('logout') }}">Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        {{-- <h2>Welcome {{ $data->firstname }} {{ $data->lastname }}</h2> --}}

        <div class="table-responsive py-5">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Pic</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>

                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Task Assign</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $data)
                        <tr>
                            <th scope="row">{{ $data->id }}</th>
                            <td>User Image</td>
                            <td>{{ $data->firstname }}</td>
                            <td>{{ $data->lastname }}</td>
                            <td>{{ $data->email }}</td>
                            {{-- <td>{{$student->contactnumber}}</td>
                  <td>{{$student->gender}}</td> --}}
                            <td>
                                @if ($data->status == 1)
                                <a href=""><button class="btn btn-primary">Activated</button></a>                                    
                                @else
                                <a href=""><button class="btn btn-danger">De Activate</button></a>
                                @endif
                               
                            </td>
                            <td><a href="{{route('seeUserPorfile', ['userId' => $data->id])}}">Give task</a></td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</body>

</html>
