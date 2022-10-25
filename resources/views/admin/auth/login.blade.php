<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body class="vertical-layout vertical-menu-modern" data-open="click" data-menu="vertical-menu-modern" data-col="" data-framework="laravel">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                        <form method="POST" action="{{ route('adminLoginPost') }}" class="box">
                            @csrf

                        <h1>Login</h1>
                        <p class="text-muted" style="color: #6c757d "> Please enter your login and password!</p>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email') }}" autofocus  placeholder="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                        @enderror

                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                        @enderror


                             <input type="submit" name="" value="Login" >
                    </form>
            </div>
        </div>
    </div>
</body>

</html>
