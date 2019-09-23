<?php

namespace App\Http\Controllers\BackEnd;

// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Categories\Store;
use App\Models\Category;

class Categories extends BackEndController
{
   	public function __construct(Category $model)
	{
		parent::__construct($model);

	}

	public function store(Store $request)
	{
		$this->model->create($request->all());

        return redirect("/admin/categories");
	}

	public function update(Store $request, $id)
	{
		$row = $this->model->findOrFail($id);

		$row->update($request->all());

		return redirect("/admin/categories");
	}
}
