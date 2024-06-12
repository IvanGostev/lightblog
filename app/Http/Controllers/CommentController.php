<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (!Comment::where('user_id', auth()->user()->id)->first()) {
            Comment::create($request->all());
        }
        return back();
    }
}
