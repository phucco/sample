<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Services\CategoryService;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->authorizeResource(Category::class, 'category');
    }

    public function index()
    {
        $categories = $this->categoryService->getAll();

        return view('backend.category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $result = $this->categoryService->create($request);

        if ($result) return redirect()->route('admin.categories.index')->with('success', 'New role has been created.');

        return back()->withInput()->with('error', 'Please try again later.');
    }

    public function show(Category $category)
    {
        return view('backend.category.show', ['category' => $category]);
    }

    public function edit(Category $category)
    {
        return view('backend.category.edit', ['category' => $category]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $result = $this->categoryService->update($request, $category);

        if ($result) return redirect()->route('admin.categories.index')->with('success', 'Category has been updated.');

        return back()->withInput()->with('error', 'Please try again later.');
    }

    public function destroy(Category $category)
    {
        $result = $this->categoryService->destroy($category);

        if ($result) return redirect()->route('admin.categories.index')->with('success', 'Category has been deleted.');

        return back()->withInput()->with('error', 'Please try again later.');
    }
}
