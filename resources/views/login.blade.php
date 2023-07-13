<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('resouces')
</head>
<body>
<div class="container">
    <div class="row align-content-center justify-content-center h-100">
        <div class="col-6">
            <h1>LOGIN</h1>
            <h5>Please input your credentials</h5>
            <form action="/login" method="POST">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" name="loginName" id="form1Example1" class="form-control"/>
                    <label class="form-label" for="form1Example1">Login name</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" name="loginPassword" id="form1Example2" class="form-control"/>
                    <label class="form-label" for="form1Example2">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex ">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked/>
                            <label class="form-check-label mx-2" for="form1Example3"> Remember me </label>
                        </div>

                        <!-- Simple link -->
                        <a class="block" href="/forgotenPassword">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                <a href="/register" class="btn btn-danger btn-block">Sign up</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
