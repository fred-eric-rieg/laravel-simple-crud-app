<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>

<body>

    <div class="vertical-container">

        <div class="card">
            <div class="title mb-16">Edit Post <a href="/"><button>Cancel</button></a>
            </div>
            <form action="/edit-post/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="title" value="{{ $post->title }}">
                <textarea name="content">{{ $post->content }}</textarea>
                <button>Save</button>
            </form>
        </div>

    </div>

</body>

</html>
