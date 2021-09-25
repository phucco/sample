<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\PostService;
use App\Http\Services\CategoryService;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    protected $postService, $categoryService;

    public function __construct(PostService $postService, CategoryService $categoryService)
    {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
        $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
        $post = $this->postService->getAll();

        return view('backend.post.index', ['posts' => $post]);
    }

    public function create()
    {        
        $categories = $this->categoryService->getCategoryList();

        return view('backend.post.create', ['categories' => $categories]);
    }

    public function store(PostRequest $request)
    {
        $result = $this->postService->create($request);

        if ($result) return redirect()->route('admin.posts.index')->with('success', 'New post has been created.');

        return back()->withInput()->with('error', 'Please try again later.');
    }

    public function show(Post $post)
    {
        return view('backend.post.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        $categories = $this->categoryService->getCategoryList();

        return view('backend.post.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $result = $this->postService->update($request, $post);

        if ($result) return redirect()->route('admin.posts.index')->with('success', 'Post has been updated.');

        return back()->withInput()->with('error', 'Please try again later.');
    }

    public function destroy(Post $post)
    {
        $result = $this->postService->destroy($post);

        if ($result) return redirect()->route('admin.posts.index')->with('success', 'Post has been deleted.');

        return back()->withInput()->with('error', 'Please try again later.');
    }
}
