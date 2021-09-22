<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;

class UploadService
{
	public function store($request)
	{
		if ($request->hasFile('file')) {
			$module = $request->input('module');

			try {
				$filename = 'thumbnail_' . rand() . '.' . $request->file('file')->extension();
			    $request->file('file')->storeAs(
				    'admin/' . $module,
				    $filename,
				    'public_uploads'
			    );

			    $path = '/uploads/admin/' . $module . '/' . $filename;

			    return $path;
		    } catch (\Exception $error) {
                return false;			
		    }
		}
	}

	public function delete($path)
	{		
		if (empty($path)) return false;

		try {
			Storage::disk('public_uploads')->delete($path);
		} catch (\Exception $error) {
            return false;			
	    }

		return true;
	}
}