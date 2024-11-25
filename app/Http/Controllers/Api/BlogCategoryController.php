<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        return response()->json(BlogCategory::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:blog_categories',
        ]);

        $category = BlogCategory::create($data);
        return response()->json($category, 201);
    }

    public function show(BlogCategory $blogCategory)
    {
        return response()->json($blogCategory);
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $data = $request->validate([
            'name' => 'string',
            'slug' => 'string|unique:blog_categories,slug,' . $blogCategory->id,
        ]);

        $blogCategory->update($data);
        return response()->json($blogCategory);
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        return response()->json(null, 204);
    }
}
