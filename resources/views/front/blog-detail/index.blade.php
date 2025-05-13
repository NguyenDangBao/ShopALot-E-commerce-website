@extends('front.layout.master')
@section('title', 'Blog Detail')

@section('body')

    <div class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2>{{ $blog->title }}</h2>
                            <p>{{ $blog->category ?? 'Uncategorized' }}
                                <span>{{ $blog->created_at ? $blog->created_at->format('M d, Y') : 'No date available' }}</span>
                            </p>
                        </div>

                        <!-- Blog main image -->
                        <div class="blog-large-pic">
                            <img src="{{ asset('front/img/blog/' . $blog->image) }}" alt="{{ $blog->title }}">
                        </div>


                        <!-- Blog Description -->
                        <div class="blog-detail-desc">
                            <p>{{ $blog->content ?? $blog->subtitle ?? 'No content available.' }}</p>
                        </div>

                        <!-- Blog Quote -->
                        <div class="blog-quote">
                            <p>{{ $blog->quote ?? 'No quote available.' }}</p>
                        </div>

                        <!-- Additional Images -->
                        <div class="blog-more">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="front/img/blog/blog-detail-1.jpg" alt="Additional Image 1">
                                </div>
                                <div class="col-sm-4">
                                    <img src="front/img/blog/blog-detail-2.jpg" alt="Additional Image 2">
                                </div>
                                <div class="col-sm-4">
                                    <img src="front/img/blog/blog-detail-3.jpg" alt="Additional Image 3">
                                </div>
                            </div>
                        </div>

                        <!-- Tags and Share Section -->
                        <div class="tag-share">
                            <div class="details-tag">
                                <ul>
                                    <li><i class="fa fa-tags"></i></li>
                                    <li>{{ $blog->category ?? 'General' }}</li>
                                </ul>
                            </div>
                            <div class="blog-share">
                                <span>Share:</span>
                                <div class="social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Previous and Next Blog Links -->
                        <div class="blog-post">
                            <div class="row">
                                {{-- Previous Post --}}
                                <div class="col-lg-5 col-md-4">
                                    @if ($prevBlog)
                                        <a href="{{ route('blog.detail', ['param' => $prevBlog->id]) }}" class="prev-blog">
                                            <div class="pb-pic">
                                                <!-- Updated to use ID instead of slug -->
                                                <img src="{{ asset('front/img/blog/' . $prevBlog->image) }}" alt="{{ $prevBlog->title }}">
                                                <i class="ti-arrow-left"></i>
                                            </div>
                                            <div class="pb-text">
                                                <span>Previous Post:</span>
                                                <h5>{{ $prevBlog->title }}</h5>
                                            </div>
                                        </a>
                                    @endif
                                </div>

                                {{-- Next Post --}}
                                <div class="col-lg-5 col-md-4 offset-lg-2">
                                    @if ($nextBlog)
                                        <a href="{{ route('blog.detail', ['param' => $nextBlog->id]) }}" class="next-blog">
                                            <div class="nb-pic">
                                                <!-- Updated to use ID instead of slug -->
                                                <img src="{{ asset('front/img/blog/' . $nextBlog->image) }}" alt="{{ $nextBlog->title }}">
                                                <i class="ti-arrow-right"></i>
                                            </div>
                                            <div class="nb-text">
                                                <span>Next Post:</span>
                                                <h5>{{ $nextBlog->title }}</h5>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <!-- Author Section -->
                        <div class="posted-by">
                            <div class="pb-pic">
                                <img src="front/img/blog/post-by.png" alt="Author">
                            </div>
                            <div class="pb-text">
                                <a href="#"><h5>Shane Lynch</h5></a>
                                <p>Author bio can be added here.</p>
                            </div>
                        </div>

                        <!-- Comment Form -->
                        <div class="leave-comment">
                            <h4>Leave A Comment</h4>
                            <form action="#" class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Email">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Messages"></textarea>
                                        <button type="submit" class="site-btn">Send message</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
