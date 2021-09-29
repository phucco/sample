<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\UploadService;

class UploadController extends Controller
{
    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
    	$this->uploadService = $uploadService;
    }

    public function store(Request $request)
    {
    	$path = $this->uploadService->store($request);

    	if ($path !== false) {
    		return response()->json([
                'error' => false,
                'path' => $path
    		]);
    	}

    	return response()->json(['error' => true]);
    }

    public function delete(Request $request)
    {
        $path = str_replace('uploads/', '', $request->input('path'));

        $result = $this->uploadService->delete($path);

        return response()->json([
            'error' => ! $result
        ]);
    }
}
