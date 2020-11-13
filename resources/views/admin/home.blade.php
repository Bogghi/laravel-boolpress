@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main role="main">

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img src="{{asset("storage/".$post->image_path)}}" alt="" style="width:100%;height:225px">
                                <div class="card-body">
                                    <h3>{{$post->title}}</h3>
                                    <p class="card-text">{{$post->content}}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{asset('admin/posts/'.$post->id)}}" class="btn btn-sm btn-outline-secondary">View</a>
                                            <a href="{{asset('admin/posts/'.$post->id.'/edit')}}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </main>

@endsection
