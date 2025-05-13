@extends('front.layout.master')
@section('title', 'Blog')

@section('body')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href=""><i class="fa fa-home"></i>Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-lg-1">
                    <div class="blog-sidebar">
                        <div class="search-form">
                            <h4>Search</h4>
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="blog-catagory">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="">ShopALot</a></li>
                                <li><a href="">Travel</a></li>
                                <li><a href="">Picnic</a></li>
                                <li><a href="">Model</a></li>
                            </ul>
                        </div>
                        <div class="recent-post">
                            <h4>Recent Post</h4>
                            <div class="recent-blog">
                                @foreach ($recentBlogs as $recentBlog)
                                    <a href="{{ route('blog.detail', ['param' => $recentBlog->id]) }}" class="rb-item">
                                        <div class="rb-pic">
                                            <img src="{{ asset('front/img/blog/' . $recentBlog->image) }}" alt="">
                                        </div>
                                        <div class="rb-text">
                                            <h6>{{ $recentBlog->title }}</h6>
                                            <p>{{ $recentBlog->category }} <span>{{ $recentBlog->created_at ? $recentBlog->created_at->format('M d, Y') : 'Date not available' }}</span></p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="blog-tags">
                            <h4>Product Tags</h4>
                            <div class="tag-item">
                                <a href="#">Towel</a>
                                <a href="#">Shoes</a>
                                <a href="#">Coat</a>
                                <a href="#">Dresses</a>
                                <a href="#">Trousers</a>
                                <a href="#">Men's hats</a>
                                <a href="#">Backpack</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-6 col-md-6">
                                <div class="blog-item">
                                    <div class="bi-pic">
                                        <img src="{{ asset('front/img/blog/' . $blog->image) }}" alt="">
                                    </div>
                                    <div class="bi-text">
                                        <!-- Updated to use ID instead of slug -->
                                        <a href="{{ route('blog.detail', ['param' => $blog->id]) }}">
                                            <h4>{{ $blog->title }}</h4>
                                        </a>
                                        <p>{{ $blog->category }} <span>{{ $blog->created_at ? $blog->created_at->format('M d, Y') : 'Date not available' }}</span></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Pagination or loading more button (if needed) -->
                        <div class="col-md-12">
                            <div class="loading-more">
                                <i class="icon_loading"></i>
                                <a href="#">Loading More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
