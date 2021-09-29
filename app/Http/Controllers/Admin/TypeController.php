<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TypeRequest;
use App\Http\Services\Admin\TypeService;
use App\Models\Type;

class TypeController extends Controller
{
    protected $typeService;

    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
        $this->authorizeResource(Type::class);
    }

    public function index()
    {
        $types = $this->typeService->getAll();

        return view('backend.type.index', ['types' => $types]);
    }

    public function create()
    {
        return view('backend.type.create');
    }

    public function store(TypeRequest $request)
    {
        $result = $this->typeService->create($request);

        if ($result) return redirect()->route('admin.types.index')->with('success', 'New type of products has been created.');

        return back()->withInput()->with('error', 'Please try again later.');
    }

    public function show(Type $type)
    {
        return view('backend.type.show', ['type' => $type]);
    }

    public function edit(Type $type)
    {
        return view('backend.type.edit', ['type' => $type]);
    }

    public function update(TypeRequest $request, Type $type)
    {
        $result = $this->typeService->update($request, $type);

        if ($result) return redirect()->route('admin.types.index')->with('success', 'Type has been updated.');

        return back()->withInput()->with('error', 'Please try again later.');
    }

    public function destroy(Type $type)
    {
        $result = $this->typeService->destroy($type);

        if ($result) return redirect()->route('admin.types.index')->with('success', 'Type has been deleted.');

        return back()->withInput()->with('error', 'Please try again later.');
    }
}
