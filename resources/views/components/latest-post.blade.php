<div class="single-widget-area news-widget mb-30">
    <h4>Latest Post</h4>

    @foreach ($posts as $item)
        <!-- Single News Area -->
        <div class="single-blog-post d-flex style-4 mb-30">
            <!-- Blog Thumbnail -->
            <div class="blog-thumbnail">
                <a href="{{ route('post.detail', ['slug' => $item->slug]) }}">
                    <img src="{{ $item->image == 'post/default.svg' ? asset('img/default.svg') : asset('storage/' . $item->image) }}"
                        laoading="lazy"></a>
            </div>

            <!-- Blog Content -->
            <div class="blog-content">
                <span class="post-date">{{ Str::substr($item->created_at, 0, 10) }}</span>
                <a href="{{ route('post.detail', ['slug' => $item->slug]) }}" class="post-title">
                    {{ $item->title }}
                </a>
            </div>
        </div>
    @endforeach
</div>
