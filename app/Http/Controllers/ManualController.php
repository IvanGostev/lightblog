<?php

namespace App\Http\Controllers;
use App\Models\Manual;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManualController extends Controller
{
    public function index()
    {
        $manual = Manual::first();
        return view('manual', compact('manual'));
    }
}
