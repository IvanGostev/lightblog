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
       Comment::create($request->all());
        return back();
    }


}
