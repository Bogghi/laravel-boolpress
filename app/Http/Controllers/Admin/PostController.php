<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\posts;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all posts
        $posts = posts::where('user_id',auth()->user()->id)->get();
        return view('admin.home',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //add a new post
        return view('admin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        // dd($data);

        $request->validate([
            "title"=> "required",
            "content"=> "required",
            "image"=> "image"
        ]);

        $path = Storage::disk('public')->put('images', $data['image']);

        // dd($path);

        $newPost = new posts;
        $newPost->title = $data['title'];
        $newPost->content = $data['content'];
        $newPost->user_id = auth()->user()->id;
        $newPost->image_path = $path;
        $newPost->save();
        return redirect()->route('posts.show',$newPost);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show the single post,based on the id
        
        $post = DB::table('posts')
            ->where('id',$id)
            ->where('user_id',auth()->user()->id)
            ->first();

        if(is_null($post)){
            return redirect()->route('posts.index');
        }else {
            return view('admin.show',compact('post'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit the single post
        $post = $post = DB::table('posts')
        ->where('id',$id)
        ->where('user_id',auth()->user()->id)
        ->first();
        if(is_null($post)){
            return redirect()->route('posts.index');
        }else {
            return view('admin.edit',compact('post'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //method to update post content
        $post = posts::find($id);
        $data = $request->all();
        // dd($data);
        $request->validate([
            "title"=> "required",
            "content"=> "required",
            "image"=> "image"
        ]);

        // dd($data);

        // dd(Storage::disk('public')->put('images', $data['image']));

        $path = Storage::disk('public')->put('images', $data['image']);


        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->image_path = $path;
        $post->update();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = posts::find($id);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
