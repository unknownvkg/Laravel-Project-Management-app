<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login User</title>
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
                                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Users Login Here</h3>
                                    <form action="{{ route('loginUser') }}" method="post">
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                                        @endif()
                                        @if (Session::has('fail'))
                                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                        @endif()
                                        @csrf
                                        <div class="row">
                                            <div class="form-outline">
                                                <input type="text" id="email"
                                                    class="form-control form-control-lg" placeholder="email"
                                                    name="email" value="{{ old('email') }}" />
                                                {{-- validation error message --}}
                                                <span class="text-danger">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="form-outline form-group">
                                                {{-- password show and hide --}}
                                                <div class="input-group">
                                                    <input type="password" class="form-control form-control-lg"
                                                        id="password" placeholder="Password" name="password" />
                                                    <div class="input-group-append">
                                                        <button type="button" id="show-hide-password"
                                                            class="btn btn-outline-secondary btn-lg">
                                                            <i class="fa fa-eye-slash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                {{-- validation error message --}}
                                                {{-- <span class="text-danger"> --}}
                                                    {{-- @error('password')
                                                        {{ $message }}
                                                    @enderror --}}
                                                {{-- </span> --}}
                                            </div>
                                        </div> <br>
                                        {{-- <span style="color: #4d4d4d">Don't have an account?</span><a
                                            href="{{ route('register') }}" class="text-dark"
                                            style="text-decoration: none">Register here</a>
                                        <div class="mt-4 pt-2"> --}}
                                            <input class="btn btn-dark btn-lg form-control " type="submit"
                                                value="Login" />
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
    </script>

</body>

</html>
