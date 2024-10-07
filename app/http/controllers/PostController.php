<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\StoreCommentRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->context = $request->context;
        $post->save();
        return redirect()->route('posts.index');
    }
    public function show($id)
    {
        $post = Post::with('comments')->findOrFail($id);
        return view('posts.show', compact('post'));
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->context = $request->context;
        $post->save();
        return redirect()->route('posts.index');
    }
    public function destroy($id)
    {
        $post = Post::with('comments')->findOrFail($id);
        $post->delete();
        $post->comments()->delete();
        return redirect()->route('posts.index');
    }
    public function commentStore(StoreCommentRequest $request){
        $post = Post::findOrFail($request->post_id);
        $post->comments()->create([
            'name' => $request->name,
            'comment' => $request->comment,
        ]);
        return redirect()->back();
    }
    public function commentDestroy($id){
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back();
    }
}
