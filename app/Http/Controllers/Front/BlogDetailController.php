<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogDetailController extends Controller
{
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

        // Find previous and next blogs based on ID
        $prevBlog = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $nextBlog = Blog::where('id', '>', $blog->id)->orderBy('id', 'asc')->first();

        // Return the view with the blog data
        return view('front.blog-detail.index', compact('blog', 'prevBlog', 'nextBlog'));
    }
}
