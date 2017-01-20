<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostsCreateRequest;
use Auth;
use App\Post;
use App\Photo;
use App\User;
use App\Category;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.create', compact('posts','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
      $user = Auth::user();
      $post = new Post;
      //dd($user);
      //$input = $request->all();
      if($file = $request->file('photo_id')){
          $name = time().$file->getClientOriginalName();
          $file->move('images', $name);
          $photo = Photo::create(['file'=>$name]);
          //$înput['photo_id'] = $photo->id;
          $post->photo_id = $photo->id;
      }

      $post->user_id = $user->id;
      $post->title = $request->title;
      $post->body = $request->body;
      $post->category_id = $request->category_id;
      $post->save();

      return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categories = Category::pluck('name', 'id')->all();
      $post = Post::findOrFail($id);
      return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsCreateRequest $request, $id)
    {
      $înput = $request->all();
      if($file = $request->file('photo_id')){
          $name = time().$file->getClientOriginalName();
          $file->move('images', $name);
          $photo = Photo::create(['file'=>$name]);
          //$înput['photo_id'] = $photo->id;
          $înput['photo_id'] = $photo->id;
      }

      Auth::user()->posts()->whereId($id)->first()->update($înput);

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
      $post = Post::findOrFail($id);
      unlink(public_path()."/images/".$post->photo->file);
      $post->delete();
      return redirect()->route('posts.index');
    }
}
