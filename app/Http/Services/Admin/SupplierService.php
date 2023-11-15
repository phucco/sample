<?php

namespace App\Http\Services\Admin;

use App\Models\Supplier;

class SupplierService
{
    public function getAll()
	{
		return Supplier::paginate(10);
	}
}