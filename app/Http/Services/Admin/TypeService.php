<?php

namespace App\Http\Services\Admin;

use App\Http\Services\Admin\UploadService;
use App\Models\Type;

class TypeService
{
	protected $uploadService;

	public function __construct(UploadService $uploadService)
	{
		$this->uploadService = $uploadService;
	}

	public function getAll()
	{
		return Type::paginate(10);
	}

	public function create($request)
	{
		try {
			Type::create($request->only('title', 'description', 'thumbnail', 'active'));
		} catch (\Exception $error) {
			return false;
		}

		return true;
	}

	public function update($request, $type)
	{
		try {
			$type->update($request->only('title', 'description', 'thumbnail', 'active'));
		} catch (\Exception $error) {
			return false;
		}

		return true;
	}

	public function destroy($type)
	{
		try {
			$this->uploadService->delete(str_replace('uploads/', '', $type->thumbnail));
			$type->delete();
		} catch (\Exception $error) {
            return false;
		}

		return true;
	}
}