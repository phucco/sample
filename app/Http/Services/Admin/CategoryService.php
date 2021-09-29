<?php
namespace App\Http\Services\Admin;

use App\Models\Category;
use App\Http\Services\Admin\UploadService;

class CategoryService
{
    protected $uploadService;

	public function __construct(UploadService $uploadService)
	{
		$this->uploadService = $uploadService;
	}

	public function getAll()
	{
		return Category::paginate(10);
	}

	public function create($request)
	{
		try {
			Category::create($request->only('title', 'description', 'thumbnail', 'active'));
		} catch (\Exception $error) {
			return false;
		}

		return true;
	}

	public function update($request, $category)
	{
		try {
			$category->update($request->only('title', 'description', 'thumbnail', 'active'));
		} catch (\Exception $error) {
			return false;
		}

		return true;
	}

	public function destroy($category)
	{
		try {
			$this->uploadService->delete(str_replace('uploads/', '', $category->thumbnail));
			$category->delete();
		} catch (\Exception $error) {
            return false;
		}

		return true;
	}

	public function getCategoryList()
	{
		return Category::get(['title', 'id']);
	}
}