{{-- <!DOCTYPE html>
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
</html> --}}

@extends('layouts.app')

@section('content')

    <main role="main">

        

            <div class="album py-5 bg-light">
                <div class="container">
    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-12 shadow-sm">
                                <img src="{{asset("storage/".$post->image_path)}}" alt="" style="width:100%;height:225px">
                                <div class="card-body">
                                    <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <label for="title">Title</label>
                                        <input type="text" name="title" value="{{$post->title}}"><br>

                                        <label for="Content">Content</label>
                                        <input type="text" name="content" value="{{$post->content}}"><br>

                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" accept="image/*" value="{{$post->image_path}}">
                                        <br>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="{{route('adminHome')}}" class="btn btn-sm btn-outline-secondary">Home</a>
                                            </div>
                                            <div class="btn-group">
                                                <input type="submit" value="update" class="btn btn-sm btn-outline-secondary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        

    </main>

@endsection
