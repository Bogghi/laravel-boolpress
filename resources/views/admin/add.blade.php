<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <label for="title">title</label>
        <label for="content">content</label>
        <label for="image">image</label>
        
        <input type="text" name="title" id="title">
        <input type="text" name="content" id="content">
        <input type="file" name="image" id="image" accept="image/*">

        <input type="submit" value="salva">
    </form>
    @if ($errors->any())
        <ul>    
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>    
        @endforeach
        </ul>
    @endif
</body>
</html>