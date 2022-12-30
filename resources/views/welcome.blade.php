@extends('layouts.template')

@section('content')
    <!-- ##### Breaking News Area Start ##### -->
    <section class="breaking-news-area mb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Breaking News Widget -->
                    <div class="breaking-news-ticker d-flex flex-wrap align-items-center">
                        <div class="title">
                            <h6>Trending</h6>
                        </div>
                        <div id="breakingNewsTicker" class="ticker">
                            <ul>
                                @foreach ($latest->limit(5)->get() as $item)
                                    <li>
                                        <a href="{{ route('post.detail', ['slug' => $item->slug]) }}">
                                            {{ $item->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breaking News Area End ##### -->

    <!-- ##### Intro News Area Start ##### -->
    <section class="intro-news-area section-padding-100-0 mb-70">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Intro News Tabs Area -->
                <div class="col-12 col-lg-8">
                    <div class="intro-news-tab">
                        <!-- Intro News Filter -->
                        <div class="intro-news-filter d-flex justify-content-between">
                            <h6>All Post</h6>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav1" data-toggle="tab" href="#nav-1"
                                        role="tab" aria-controls="nav-1" aria-selected="true">Latest</a>
                                    <a class="nav-item nav-link" id="nav2" data-toggle="tab" href="#nav-2"
                                        role="tab" aria-controls="nav-2" aria-selected="false">Popular</a>
                                </div>
                            </nav>
                        </div>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav1">
                                <div class="row">
                                    @foreach ($latest->limit(4)->get() as $item)
                                        <!-- Single News Area -->
                                        <div class="col-12 col-sm-6">
                                            <div class="single-blog-post style-2 mb-5">
                                                <!-- Blog Thumbnail -->
                                                <div class="blog-thumbnail">
                                                    <a href="{{ route('post.detail', ['slug' => $item->slug]) }}">
                                                        <img src="{{ $item->image == 'post/default.svg' ? asset('img/default.svg') : asset('storage/' . $item->image) }}"
                                                            loading="lazy">
                                                    </a>
                                                </div>

                                                <!-- Blog Content -->
                                                <div class="blog-content">
                                                    <span class="post-date">
                                                        {{ Str::substr($item->created_at, 0, 10) }}
                                                    </span>
                                                    <a href="{{ route('post.detail', ['slug' => $item->slug]) }}"
                                                        class="post-title">
                                                        {{ $item->title }}
                                                    </a>
                                                    <a href="{{ route('post.detail', ['slug' => $item->slug]) }}"
                                                        class="post-author">
                                                        By {{ $item->author }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav2">
                                <div class="row">
                                    @foreach ($popular->limit(4)->get() as $item)
                                        <!-- Single News Area -->
                                        <div class="col-12 col-sm-6">
                                            <div class="single-blog-post style-2 mb-5">
                                                <!-- Blog Thumbnail -->
                                                <div class="blog-thumbnail">
                                                    <a href="{{ route('post.detail', ['slug' => $item->slug]) }}">
                                                        <img src="{{ $item->image == 'post/default.svg' ? asset('img/default.svg') : asset('storage/' . $item->image) }}"
                                                            loading="lazy">
                                                    </a>
                                                </div>

                                                <!-- Blog Content -->
                                                <div class="blog-content">
                                                    <span class="post-date">
                                                        {{ Str::substr($item->created_at, 0, 10) }}
                                                    </span>
                                                    <a href="{{ route('post.detail', ['slug' => $item->slug]) }}"
                                                        class="post-title">
                                                        {{ $item->title }}
                                                    </a>
                                                    <a href="{{ route('post.detail', ['slug' => $item->slug]) }}"
                                                        class="post-author">
                                                        By {{ $item->author }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="sidebar-area">
                        <!-- Search Widget -->
                        <x-search-widget />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Intro News Area End ##### -->
@endsection
