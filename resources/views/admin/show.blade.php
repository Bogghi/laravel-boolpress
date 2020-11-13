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
                                <h3>{{$post->title}}</h3>
                                <p class="card-text">{{$post->content}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('adminHome')}}" class="btn btn-sm btn-outline-secondary">Home</a>
                                        <a href="{{asset('admin/posts/'.$post->id.'/edit')}}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
