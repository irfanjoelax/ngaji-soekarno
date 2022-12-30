<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chart_options = [
            'chart_title' => 'Post per Category',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Post',
            'group_by_field' => 'category',
            'group_by_period' => 'year',
            'chart_type' => 'bar',
        ];
        $chart = new LaravelChart($chart_options);

        return view('admin.home', [
            'all_post'    => Post::count(),
            'all_artikel' => Post::where('category', 'artikel')->count(),
            'all_buletin' => Post::where('category', 'buletin')->count(),
            'all_info'    => Post::where('category', 'info')->count(),
            'chart'       => $chart,
        ]);
    }
}
