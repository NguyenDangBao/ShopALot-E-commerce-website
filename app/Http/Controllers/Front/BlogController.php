<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\Blog\BlogServiceInterface;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogServiceInterface $blogService)
    {
        $this->blogService = $blogService;
    }

    // Trang danh sách blog
    public function index()
    {
        $blogs = Blog::all(); // Hoặc có thể sử dụng paginating
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(5)->get(); // Lấy 5 bài blog gần nhất
        return view('front.blog.index', compact('blogs', 'recentBlogs'));
    }

    // Trang chi tiết bài viết
    public function show($titleOrId)
    {
        // First, try to find the blog by its ID if the parameter is numeric
        if (is_numeric($titleOrId)) {
            $blog = Blog::find($titleOrId);
        } else {
            // Otherwise, search for blogs with titles that match the parameter
            // Convert the URL parameter back to a title format
            $searchTitle = str_replace('-', ' ', $titleOrId);

            // Find blogs with similar titles (case insensitive)
            $blog = Blog::whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($searchTitle) . '%'])
                ->first();
        }

        // If blog not found, return 404
        if (!$blog) {
            abort(404);
        }

        // Find previous and next blogs based on ID for navigation
        $prevBlog = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $nextBlog = Blog::where('id', '>', $blog->id)->orderBy('id', 'asc')->first();

        // Changed variable name from $post to $blog to match the view
        return view('front.blog-detail.index', compact('blog', 'prevBlog', 'nextBlog'));
    }
}
