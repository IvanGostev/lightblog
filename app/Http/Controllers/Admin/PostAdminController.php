<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostAdminController extends Controller
{

    public function index(): View
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create(): View
    {
        $tags = Tag::all();
        return view('admin.post.create', compact('tags',));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'img' => ['nullable', 'file'],
            'text' => ['required', 'string'],
            'tags' => ['nullable', 'array']
        ]);
        if (isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
        }
        if (isset($data['img'])) {
            $data['img'] = Storage::disk('public')->put('/images', $data['img']);
        }
        $post = Post::firstOrCreate($data);
        if (isset($tags)) {
            foreach ($tags as $tag) {
                PostTag::firstOrCreate(['post_id' => $post->id, 'tag_id' => $tag]);
            }
        }
        return redirect()->route('admin.post.index');
    }

    public function edit(Post $post): View
    {
        $tags = Tag::all();
        $oldTags = PostTag::where('post_id', $post->id)->pluck('tag_id')->toArray();
        return view('admin.post.edit', compact('post', 'tags', 'oldTags'));
    }

    public function update(Post $post, Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'img' => ['nullable', 'file'],
            'text' => ['required', 'string'],
            'tags' => ['nullable', 'array']
        ]);
        if (isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
        }
        if (isset($data['img'])) {
            $data['img'] = Storage::disk('public')->put('/images', $data['img']);
        }
        $post->update($data);
        $tempTags = PostTag::where('post_id', $post->id)->get();
        foreach ($tempTags as $tag) {
            $tag->delete();
        }
        if (isset($tags)) {

            foreach ($tags as $tag) {
                PostTag::firstOrCreate(['post_id' => $post->id, 'tag_id' => $tag]);
            }
        }
        return redirect()->route('admin.post.index');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $tags = PostTag::where('post_id', $post->id)->get();
        foreach ($tags as $tag) {
            $tag->delete();
        }
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
