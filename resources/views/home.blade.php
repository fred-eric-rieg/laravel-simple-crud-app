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
        <div class="horizontal-container">
            <div class="vertical-container">
                <div class="card">
                    <p>Congrats you are logged in</p>
                    <form action="/logout" method="POST">
                        @csrf
                        <button>Logout</button>
                    </form>
                </div>

                <div class="card">
                    <p>Create a New Post</p>
                    <form action="/create-post" method="POST">
                        @csrf
                        <input type="text" name="title" placeholder="title">
                        <textarea name="content" placeholder="content"></textarea>
                        <button>Post</button>
                    </form>
                </div>
            </div>

            <div class="vertical-container left">
                <h1>Your Posts</h1>

                @foreach ($posts as $post)
                    <div class="card">
                        <div class="title">{{ $post['title'] }} by {{$post->user->name}}
                            <form action="/delete-post/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>Delete</button>
                            </form>
                        </div>
                        <p>{{ $post['content'] }}</p>
                        <a href="/edit-post/{{ $post->id }}"><button>Edit</button></a>

                    </div>
                @endforeach

            </div>

        </div>
    @else
        <div class="vertical-container">
            <p>Typen wie dich können wir hier nicht besonders gut leiden!</p>
            <a href="/login"><button>Go to Login</button></a>
        </div>


    @endauth


</body>

</html>
