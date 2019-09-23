<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Skills\Store;
use App\Models\Tag;

class Tags extends BackEndController
{
    public function __construct(Tag $model)
	{
		parent::__construct($model);

	}

	public function store(Store $request)
	{
		$this->model->create($request->all());

        return redirect("/admin/tags");
	}

	public function update(Store $request, $id)
	{
		$row = $this->model->findOrFail($id);

		$row->update($request->all());

		return redirect("/admin/tags");
	}
}
