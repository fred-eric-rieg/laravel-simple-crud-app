<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>
<body>

    @auth
    <div class="container">
        <div class="card">
            <p>Congrats you are logged in</p>
            <form action="/logout" method="POST">
                @csrf
                <button>Logout</button>
            </form>
        </div>
    </div>
    

    @else

    <div class="container">
    
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

    </div>

    @endauth

    
</body>
</html>