{{-- <p>User ID: {{ $user->id }}</p> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    /* for number input field */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>

<body>
    <div class="bg-dark">
        <div class="container">
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="mt-4 pt-2">
                        <a class="btn btn-secondary btn-lg  "type="submit" href="{{ route('afterloginpage') }}">Back</a>
                    </div>

                    <div class="row justify-content-center align-items-center h-100">
                        <div class="col-12 col-lg-9 col-xl-7">
                            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                                <div class="card-body p-4 p-md-5">
                                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Assign Task</h3>
                                    {{-- <form action="" method="post"> --}}
                                    <form action="{{ route('addTask') }}" method="post">
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                                        @endif()
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="firstName" readonly
                                                        class="form-control form-control-lg" name="user_id"
                                                        value="{{ $user->id }}" />

                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="projectTitle"
                                                        class="form-control form-control-lg"
                                                        placeholder="Enter Project Name" name="project_name" />
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="form-outline form-group">
                                                    <div class="input-group">
                                                        <input type="text" id="projectTitle"
                                                            class="form-control form-control-lg"
                                                            placeholder="Enter Project Title" name="project_title" />
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="form-outline form-group">
                                                    <div class="input-group">
                                                        <textarea type="text" id="descripation" class="form-control form-control-lg" placeholder="Descripation"
                                                            name="descripation" rows="1"></textarea>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="mt-4 pt-2">
                                            <input class="btn btn-dark btn-lg form-control " type="submit"
                                                value="Add" />
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        

    </div>
</body>

</html>
