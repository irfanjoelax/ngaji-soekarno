@extends('layouts.template')

@section('content')
    <!-- ##### Post Details Title Area Start ##### -->
    <div class="post-details-title-area bg-overlay clearfix"
        style="background-image: url({{ $post->image == 'post/default.svg' ? asset('img/default.svg') : asset('storage/' . $post->image) }})">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-lg-8">
                    <!-- Post Content -->
                    <div class="post-content">
                        <p class="tag"><span>{{ Str::ucfirst($post->category) }}</span></p>
                        <p class="post-title">{{ $post->title }}</p>
                        <div class="d-flex align-items-center">
                            <span class="post-date mr-30">{{ Str::substr($post->created_at, 0, 10) }}</span>
                            <span class="post-date">By {{ $post->author }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Post Details Title Area End ##### -->

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-news-area section-padding-100-0 mb-70">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8">
                    <div class="post-details-content mb-100">
                        {!! $post->content !!}
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="sidebar-area">
                        <!-- Search Widget -->
                        <x-search-widget />

                        <!-- Latest News Widget -->
                        <x-latest-post />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
