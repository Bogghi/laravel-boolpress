<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('posts.update',$post->id)}}" method="post">
        @csrf
        @method('PUT')


        <label for="title">title</label>
        <label for="content">content</label>
        <input type="text" name="title" id="title" value="{{$post->title}}">
        <input type="text" name="content" id="content" value="{{$post->content}}">

        <input type="submit" value="upate">
    </form>

</body>
</html>