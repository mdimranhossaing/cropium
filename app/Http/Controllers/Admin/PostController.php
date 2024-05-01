<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function all_posts()
    {
        $data['posts'] = Post::latest()->get();
        return view('admin.pages.all-posts', $data);
    }
}
