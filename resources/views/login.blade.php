<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>
<body>

    <div class="vertical-container">
    
        <div class="card">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="text" placeholder="email" name="login_email">
                <input type="password" placeholder="password" name="login_password">
                <button>Login</button>
            </form>
            
        </div>

        <div class="btn-group">
            <span>New here?</span>
            <a href="/register"><button>Register</button></a>
        </div>

        @foreach ($users as $user)
            <div>
                <p>{{$user->email}}</p>
            </div>
            

        @endforeach

    </div>
    
</body>
</html>