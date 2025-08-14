<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class PostController extends Controller
{
    public function index()
    {
        $postsFromDB = Post::all();
        return view("posts.index", ["posts" => $postsFromDB]);
    }
    // public function show($post_id)
    // {
    //     $singlePostFromDB = Post::find($post_id);
    //     if (is_null($singlePostFromDB)) {
    //         return to_route("posts.index");
    //     }
    //     // $singlePostFromDB = Post::findOrFail($post_id);
    //     // $singlePostFromDB = Post::where("id", $post_id)->first();
    //     // $singlePostFromDB = Post::where("id", $post_id)->get();
    //     return view("posts.show", ["singlePost" => $singlePostFromDB]);
    // }
    public function show(Post $post)
    {
        return view("posts.show", ["singlePost" => $post]);
    }
    public function create()
    {
        $users = User::all();
        return view("posts.create", ["users" => $users]);
    }
    public function store()
    {
        request()->validate([
            "title" => ['required', "min:3"],
            "description" => ["required", "min:5"],
            "post_creator" => ["required", "exists:users,id"]
        ]);
        $data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;
        // $post  = new Post;
        // $post->title = $title;
        // $post->description = $description;
        // $post->postCreator = $postCreator;
        // $post->save();
        Post::create(["title" => $title, "description" => $description, "user_id" => $postCreator]);
        return to_route("posts.index");
    }
    public function edit(Post $post)
    {
        $users = User::all();
        return view("posts.edit", ["post_data" => $post, "users" => $users]);
    }
    public function update($post_id)
    {
        request()->validate([
            "title" => ['required', "min:3"],
            "description" => ["required", "min:5"],
            "post_creator" => ["required", "exists:users,id"]
        ]);
        $data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;
        $singlePostFromDB = Post::find($post_id);
        $singlePostFromDB->update(["title" => $title, "description" => $description, "user_id" => $postCreator]);
        return to_route("posts.show", $post_id);
    }
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        // Post::destroy($post_id);
        $post->delete();
        return to_route("posts.index");
    }
}
