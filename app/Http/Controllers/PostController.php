<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function index(Request $request, Post $posts)
    {
        $category = $request->input('category');
        $keyword = $request->input('keyword');

        $posts = $posts->when($keyword, function ($query) use ($keyword) {
            return $query->where('title', 'like', '%' . $keyword . '%');
        })->where('category', $category)->paginate(10);

        $request = $request->all();

        return view('admin.post.index', [
            'request'  => $request,
            'posts'    => $posts,
            'category' => $category,
        ]);
    }

    public function create(Request $request)
    {
        $category = $request->input('category');

        return view('admin.post.form', [
            'isEdit' => false,
            'url' => route('post.store', ['category' => $category]),
            'category' => $category,
        ]);
    }

    public function store(Request $request)
    {
        $category = $request->input('category');

        $image = 'post/default.svg';
        $file = null;

        if ($request->has('image')) {
            $image = $request->file('image')->store('post');
        }

        if ($request->has('file')) {
            $file = $request->file('file')->store('file');
        }

        Post::create([
            'title'    => $request->title,
            'slug'     => Str::slug($request->title),
            'image'    => $image,
            'content'  => $request->content,
            'category' => $category,
            'author'   => $request->author,
            'visited'  => 0,
            'file'     => $file,
        ]);

        Alert::success('Created', 'Post ' . $category . ' has been created');

        return redirect('post?category=' . $category);
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        $category = $request->input('category');

        return view('admin.post.form', [
            'isEdit'   => true,
            'url'      => route('post.update', ['post' => $id, 'category' => $category]),
            'category' => $category,
            'data'     => Post::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = $request->input('category');

        $post = Post::findOrFail($id);

        $image = $post->image;
        $file = $post->file;

        if ($request->has('image')) {
            Storage::delete($post->image);
            $image = $request->file('image')->store('post');
        }

        if ($request->has('file')) {
            Storage::delete($post->file);
            $file = $request->file('file')->store('file');
        }

        $post->update([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'image'   => $image,
            'content' => $request->content,
            'author'  => $request->author,
            'file'    => $file,
        ]);

        Alert::info('Updated', 'Post ' . $category . ' has been updated');

        return redirect('post?category=' . $category);
    }

    public function destroy(Request $request, $id)
    {
        $category = $request->input('category');

        $post = Post::findOrFail($id);

        Storage::delete($post->image);

        if ($post->file != null) {
            Storage::delete($post->file);
        }

        $post->delete();

        Alert::error('Deleted', 'Post ' . $category . ' has been deleted');

        return redirect('post?category=' . $category);
    }
}
