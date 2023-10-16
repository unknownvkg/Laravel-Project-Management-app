<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="bg-dark">
        <div class="container">
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row justify-content-center align-items-center h-100">
                        <div class="col-12 col-lg-9 col-xl-7">
                            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                                <div class="card-body p-4 p-md-5">
                                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Register Here</h3>
                                    {{-- <form action="" method="post"> --}}
                                    <form action="{{ route('registeruser') }}" method="post">
                                        {{-- @if (Session::has('success'))
                                            <div class="alert alert-success">{{Session::get('success')}}</div>
                                            @endif()
                                            @if (Session::has('fail'))
                                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                            @endif() --}}
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="firstName"
                                                        class="form-control form-control-lg"
                                                        placeholder="Enter first name" name="firstname"
                                                        value="{{ old('firstname') }}" />
                                                    {{-- validation error message --}}
                                                    <span class="text-danger">
                                                        @error('firstname')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="lastName"
                                                        class="form-control form-control-lg"
                                                        placeholder="Enter last name" name="lastname"
                                                        value="{{ old('lastname') }}" />
                                                    {{-- validation error message --}}
                                                    <span class="text-danger">
                                                        @error('lastname')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 mb-4 d-flex align-items-center">

                                                <div class="form-outline datepicker w-100">
                                                    <input type="text" class="form-control form-control-lg"
                                                        id="birthdayDate" placeholder="Enter username" name="username"
                                                        value="{{ old('username') }}" />
                                                    {{-- validation error message --}}
                                                    <span class="text-danger">
                                                        @error('username')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>

                                            </div>
                                            {{-- <div class="col-md-6 mb-4">
                                                <h6 class="mb-2 pb-1">Gender:</h6>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="maleGender"
                                                        value="M" name="gender" />
                                                    <label class="form-check-label" for="maleGender">Male</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="femaleGender"
                                                        value="F" name="gender" />
                                                    <label class="form-check-label" for="femaleGender">Female</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="otherGender"
                                                        value="O" name="gender" />
                                                    <label class="form-check-label" for="otherGender">Other</label>
                                                </div>

                                            </div> --}}
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="form-outline form-group">
                                                    <div class="input-group">
                                                        <input type="password" id="password"
                                                            class="form-control form-control-lg"
                                                            placeholder="Enter password" name="password" />
                                                        {{-- password show and hide --}}
                                                        <div class="input-group-append">
                                                            <button type="button" id="show-hide-password"
                                                                class="btn btn-outline-secondary btn-lg">
                                                                <i class="fa fa-eye-slash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    {{-- validation error message --}}
                                                    <span class="text-danger">
                                                        @error('password')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="form-outline form-group">
                                                    <div class="input-group">
                                                        <input type="password" id="password1"
                                                            class="form-control form-control-lg"
                                                            placeholder="Enter password again" name="confirmpassword" />
                                                        {{-- confirm password show and hide --}}
                                                        <div class="input-group-append">
                                                            <button type="button" id="show-hide-password1"
                                                                class="btn btn-outline-secondary btn-lg">
                                                                <i class="fa fa-eye-slash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    {{-- validation error message --}}
                                                    <span class="text-danger">
                                                        @error('confirmpassword')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                        <span style="color: #4d4d4d">Have already an account?</span><a href="{{route('login')}}" class="text-dark" style="text-decoration: none" >Login here</a>
                                        {{-- <span style="color: #4d4d4d">Have already an account?</span><a href=""
                                            class="text-dark" style="text-decoration: none">Login here</a> --}}
                                        <div class="mt-4 pt-2">
                                            <input class="btn btn-dark btn-lg form-control " type="submit"
                                                value="Register" />
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>

    </div>
    {{-- password show and hide script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // it is for password field
        $(document).ready(function() {
            $("#show-hide-password").click(function() {
                var passwordField = $("#password");
                var passwordFieldType = passwordField.attr("type");

                if (passwordFieldType === "password") {
                    passwordField.attr("type", "text");
                    $(this).html('<i class="fa fa-eye"></i>');
                } else {
                    passwordField.attr("type", "password");
                    $(this).html('<i class="fa fa-eye-slash"></i>');
                }
            });
        });
        // it is for confirm password field
        $(document).ready(function() {
            $("#show-hide-password1").click(function() {
                var passwordField = $("#password1");
                var passwordFieldType = passwordField.attr("type");

                if (passwordFieldType === "password") {
                    passwordField.attr("type", "text");
                    $(this).html('<i class="fa fa-eye"></i>');
                } else {
                    passwordField.attr("type", "password");
                    $(this).html('<i class="fa fa-eye-slash"></i>');
                }
            });
        });
    </script>

</body>

</html>
