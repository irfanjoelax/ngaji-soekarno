<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome(Request $request)
    {
        $keyword = $request->input('keyword');
        $posts = Post::query();

        if ($request->has('keyword')) {
            $posts->where('title', 'like', '%' . $keyword . '%');
        }

        return view('welcome', [
            'latest' => $posts->latest(),
            'popular' => $posts->orderBy('visited', 'DESC'),
        ]);
    }

    public function post(Request $request)
    {
        $category = $request->input('category');

        return view('post_all', [
            'category' => $category,
            'posts'    => Post::where('category', $category)->limit(15)->latest()->get(),
        ]);
    }

    public function post_detail($slug)
    {
        $post = Post::where('slug', $slug)->first();

        $post->increment('visited');

        return view('post_detail', [
            'post' => $post,
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'information' => Information::first(),
        ]);
    }
}
