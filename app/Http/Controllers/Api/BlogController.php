<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return response()->json(Blog::with('category')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:blogs',
            'short_desc' => 'nullable|string',
            'content' => 'required|string',
            'category_blog_id' => 'required|exists:blog_categories,id',
        ]);

        $blog = Blog::create($data);
        return response()->json($blog, 201);
    }

    public function show(Blog $blog)
    {
        return response()->json($blog->load('category'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => 'string',
            'slug' => 'string|unique:blogs,slug,' . $blog->id,
            'short_desc' => 'nullable|string',
            'content' => 'string',
            'category_blog_id' => 'exists:blog_categories,id',
        ]);

        $blog->update($data);
        return response()->json($blog);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json(null, 204);
    }
}
