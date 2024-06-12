<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CommentAdminController extends Controller
{

    public function index(): View
    {
        $comments = Comment::all();
        return view('admin.comment.index', compact('comments'));
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();
        return redirect()->route('admin.comment.index');
    }
}
