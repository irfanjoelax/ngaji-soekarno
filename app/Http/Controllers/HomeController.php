<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home', [
            'all_post'    => Post::count(),
            'all_artikel' => Post::where('category', 'artikel')->count(),
            'all_buletin' => Post::where('category', 'buletin')->count(),
            'all_info'    => Post::where('category', 'info')->count(),
        ]);
    }
}
