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
            <h1>REGISTER</h1>
            <h5>Please input your credentials</h5>
            <form action="/register" method="POST">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" name="name" id="form1Example1" class="form-control"/>
                    <label class="form-label" for="form1Example1">Login name</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="email" name="email" id="form1Example1" class="form-control"/>
                    <label class="form-label" for="form1Example1">Email</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" name="password" id="form1Example2" class="form-control"/>
                    <label class="form-label" for="form1Example2">Password</label>
                </div>
                

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Sign up</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
