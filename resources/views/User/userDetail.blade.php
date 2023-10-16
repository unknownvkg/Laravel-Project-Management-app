<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Task List</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">All Data of User</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 1250px">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        {{-- <a class="nav-link active" aria-current="page" href="{{ route('add') }}">Add User</a> --}}
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('edituser', ['id' => $data->id]) }}">Edit User</a>
                    href="{{route('edituser',['id'=>$data->id])}}"
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="logout">Logout</a>
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
                        <th scope="col">Task Id</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Project Title</th>
                        <th scope="col">Descripation</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $data)
                    <tr>
                        <th scope="row">{{ $data->task_id }}</th>
                        <td>{{ $data->user_id }}</td>
                        <td>{{ $data->project_name }}</td>
                        <td>{{ $data->project_title }}</td>
                        <td>{{ $data->descripation }}</td>
                        {{-- <td>{{ $data->status }}</td> --}}
                        <td>
                            <select data-taskid="{{ $data->task_id }}" class="form-control status" name="status"
                                style="width: 100%">
                                <option value="1" @if ($data->status == 1) selected @endif>Not Started</option>
                                <option value="2" @if ($data->status == 2) selected @endif>In Progress</option>
                                <option value="3" @if ($data->status == 3) selected @endif>Testing</option>
                                <option value="4" @if ($data->status == 4) selected @endif>Completed</option>
                            </select>


                        </td>
                        <td><a href=""></a>Edit</td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <script type="text/javascript">
   $(document).ready(function() {
    $(document).on('change', '.status', function() {
        // Get the selected value from the select input
        let selectedStatus = $(this).val();
        let taskID = $(this).data('taskid'); // Use data() to access data attributes

        // Make an AJAX request to update the status
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'PATCH',
            url: `/user/task/update-status/${taskID}`,
            data: {
                status: selectedStatus
            },
            success: function(data) {
                // Handle the success response
                console.log('Status updated successfully.');
                alert(data.message);
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.log('Error updating status: ' + error);
            }
        });
    });
});

    </script>
</body>

</html>