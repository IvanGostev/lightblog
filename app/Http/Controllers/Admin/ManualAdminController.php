<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Manual;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ManualAdminController extends Controller
{
    public function edit(): View
    {
        if (Manual::first() !== null) {
            $manual = Manual::first();
            return view('admin.manual.edit', compact('manual'));
        } else {
            return view('admin.manual.create');
        }
    }
    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
        Manual::create($data);
        return redirect()->route('manual');
    }
    public function update(Request $request): RedirectResponse
    {
        $data = $request->all();
        $manual = Manual::first();
        $manual->update($data);
        return redirect()->route('manual');
    }

}
