<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{

    public function index(Request $request)
    {
        $tags = Tag::all();
        if (isset($request->tag)) {
            $posts = Post::join('post_tags', 'posts.id', '=', 'post_tags.post_id')
                ->where('post_tags.tag_id', '=', $request->tag)
                ->select('posts.*')
                ->get();
            $tagActive = Tag::where('id', $request->tag)->first();
            return view('post.index', compact('tags', 'posts', 'tagActive'));
        }
        $posts = Post::all();
        return view('post.index', compact('tags', 'posts'));
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
}
