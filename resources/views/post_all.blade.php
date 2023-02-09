@extends('layouts.template')

@section('content')
    <!-- ##### Top News Area Start ##### -->
    <div class="top-news-area mt-3 mb-5">
        <div class="container">
            <div class="row">

                <div class="col-12 mb-5 text-center">
                    <h1>{{ Str::ucfirst($category) }}</h1>
                    <h6 class="text-muted">Daftar Lengkap Berdasarkan Kategori</h6>
                </div>

                @foreach ($posts as $item)
                    <!-- Single News Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-blog-post style-2 mb-5">
                            <!-- Blog Thumbnail -->
                            <div class="blog-thumbnail">
                                <a href="{{ route('post.detail', ['slug' => $item->slug]) }}"><img
                                        src="{{ $item->image == 'post/default.svg' ? asset('img/default.svg') : asset('storage/' . $item->image) }}"
                                        loading="lazy"></a>
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                <span class="post-date">
                                    {{ Str::ucfirst($item->category) }} &#8226;
                                    {{ $item->created_at->diffForHumans() }}
                                </span>
                                <a href="{{ route('post.detail', ['slug' => $item->slug]) }}" class="post-title">
                                    {{ $item->title }}
                                </a>
                                <a href="{{ route('post.detail', ['slug' => $item->slug]) }}" class="post-author">
                                    By {{ $item->author }}
                                </a>
                                @if ($item->category == 'buletin')
                                    @if ($item->file != null)
                                        <a href="{{ asset('storage/' . $item->file) }}"
                                            class="mt-3 btn btn-block text-decoration-none text-white"
                                            style="background-color: #EF1B48">
                                            Unduh
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ##### Top News Area End ##### -->
@endsection
