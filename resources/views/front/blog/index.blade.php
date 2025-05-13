
@extends('front.layout.master')
@section('title', 'blog')

@section('body')
    <!--    Breadcrumb Section Begin-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href=""><i class="fa fa-home"></i>Home</a>
                        <span>Blog
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--    Breadcrumb Section End-->

<!--    Blog Section Begin-->
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
                            <a href="#" class="rb-item">
                                <div class="rb-pic">
                                    <img src="front/img/blog/recent-1.jpg" alt="">
                                </div>
                                <div class="rb-text">
                                    <h6>The Personality Trait  That Makes...</h6>
                                    <p>ShopALot  <span>May 19, 2024</span></p>
                                </div>

                            </a>
                            <a href="#" class="rb-item">
                                <div class="rb-pic">
                                    <img src="front/img/blog/recent-2.jpg" alt="">
                                </div>
                                <div class="rb-text">
                                    <h6>The Personality Trait  That Makes...</h6>
                                    <p>ShopALot  <span>May 19, 2024</span></p>
                                </div>

                            </a>
                            <a href="#" class="rb-item">
                                <div class="rb-pic">
                                    <img src="front/img/blog/recent-3.jpg" alt="">
                                </div>
                                <div class="rb-text">
                                    <h6>The Personality Trait  That Makes...</h6>
                                    <p>ShopALot  <span>May 19, 2024</span></p>
                                </div>

                            </a>
                            <a href="#" class="rb-item">
                                <div class="rb-pic">
                                    <img src="front/img/blog/recent-4.jpg" alt="">
                                </div>
                                <div class="rb-text">
                                    <h6>The Personality Trait  That Makes...</h6>
                                    <p>ShopALot  <span>May 19, 2024</span></p>
                                </div>

                            </a>
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
                        <div  class="col-lg-6 col-md-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="front/img/blog/blog-1.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="blog-details.html">
                                        <h4>The Best Street Style From London ShopAlot Week</h4>
                                    </a>
                                    <p>Travel <span>May 19, 2024</span></p>
                                </div>
                            </div>
                        </div>
                        <div  class="col-lg-6 col-md-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="front/img/blog/blog-2.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="blog-details.html">
                                        <h4>Vogue's Ultimate Guide To Autumn/Winter 2024 Shoes</h4>
                                    </a>
                                    <p>ShopALot<span>May 19, 2024</span></p>
                                </div>
                            </div>
                        </div>
                        <div  class="col-lg-6 col-md-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="front/img/blog/blog-3.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="blog-details.html">
                                        <h4>How To Brighten Your Wardrobe With A Dash Of Lime</h4>
                                    </a>
                                    <p>Travel <span>May 19, 2024</span></p>
                                </div>
                            </div>
                        </div>
                        <div  class="col-lg-6 col-md-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="front/img/blog/blog-4.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="blog-details.html">
                                        <h4>Happy New Year! I know I am a little late on this post</h4>
                                    </a>
                                    <p>ShopALot<span>May 19, 2024</span></p>
                                </div>
                            </div>
                        </div>
                        <div  class="col-lg-6 col-md-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="front/img/blog/blog-5.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="blog-details.html">
                                        <h4>Absolute collection, The Lancome team has been one...</h4>
                                    </a>
                                    <p>Model<span>May 19, 2024</span></p>
                                </div>
                            </div>
                        </div>
                        <div  class="col-lg-6 col-md-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                    <img src="front/img/blog/blog-6.jpg" alt="">
                                </div>
                                <div class="bi-text">
                                    <a href="blog-details.html">
                                        <h4>Writing has always been kind of therapeutic for me</h4>
                                    </a>
                                    <p>ShopALot<span>May 19, 2024</span></p>
                                </div>
                            </div>
                        </div>
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

    <!--    Blog Section End-->

@endsection
