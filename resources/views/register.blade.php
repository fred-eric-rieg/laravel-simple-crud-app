<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>
<body>
    
    <div class="container">
        <div class="card">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="text" placeholder="name" name="name">
                <input type="text" placeholder="email" name="email">
                <input type="password" placeholder="password" name="password">
                <button>Register</button>
            </form>
        </div>

        <div class="btn-group">
            Back to Login
            <a href="/"><button>Login</button></a>
        </div>
    </div>
</body>
</html>