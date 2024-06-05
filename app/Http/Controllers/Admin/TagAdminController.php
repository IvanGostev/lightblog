<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagAdminController extends Controller
{

    public function index(): View
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }

    public function create() : View {
        return view('admin.tag.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        Tag::create(['title' => $request->title]);
        return redirect()->route('admin.tag.index');
    }

    public function edit(Tag $tag) : View {
        return view('admin.tag.edit', compact('tag'));
    }
    public function update(Tag $tag, Request $request) : RedirectResponse
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $tag->update(['title' => $request->title]);
        return redirect()->route('admin.tag.index');
    }
    public function destroy(Tag $tag) : RedirectResponse {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
