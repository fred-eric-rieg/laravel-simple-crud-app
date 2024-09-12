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
        <p>Typen wie dich können wir hier nicht besonders gut leiden!</p>
        <a href="/login"><button>Go to Login</button></a>
    </div>
    

    @endauth

    
</body>
</html>