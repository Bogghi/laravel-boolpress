<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($posts as $post)
        <ul>
            <li>{{$post->title}}</li>
            <li>{{$post->content}}</li>
            <li>{{$post->user_id}}</li>
            <li>
                <img src="{{$post->image_path}}" alt="">
            </li>
            <form action="{{route('posts.destroy',$post->id)}}" method="post">
                @method('DELETE')
                @csrf
                <input type="submit" value="Cancella">
            </form>
        </ul>
    @endforeach
</body>
</html>