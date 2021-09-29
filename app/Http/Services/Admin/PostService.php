<?php

namespace App\http\Services\Admin;

use App\Http\Services\Admin\UploadService;
use App\Models\Post;

class PostService
{
	protected $uploadService;

	public function __construct(UploadService $uploadService)
	{
		$this->uploadService = $uploadService;
	}
	
	public function getAll()
	{
		return Post::with('category')->paginate(10);
	}

	public function create($request)
	{
		try {
			Post::create($request->only('title', 'category_id', 'description', 'content', 'thumbnail', 'active'));
		} catch (\Exception $error) {
			return false;
		}

		return true;
	}

	public function update($request, $post)
	{
		try {
			$post->update($request->only('title', 'category_id', 'description', 'content', 'thumbnail', 'active'));
		} catch (\Exception $error) {
			return false;
		}

		return true;
	}

	public function destroy($post)
	{
		try {
			$this->uploadService->delete(str_replace('uploads/', '', $post->thumbnail));
			$post->delete();
		} catch (\Exception $error) {
            return false;
		}

		return true;
	}
}