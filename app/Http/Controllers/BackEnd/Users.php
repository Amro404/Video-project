<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use App\Models\User;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// use App\Http\Controllers\Controller;

class Users extends BackEndController
{
	public function __construct(User $model)
	{
		parent::__construct($model);

	}

	public function store(Store $request)
	{
		$requestArray = $request->all();
		$requestArray["password"] = Hash::make($requestArray["password"]);
		$this->model->create($requestArray);

        return redirect("/admin/users");
	}

	public function update(Update $request, $id)
	{
		$row = $this->model->findOrFail($id);

		$requestArray = $request->all();

		if(isset($requestArray["password"]) && $requestArray["password"] != "") {

			$requestArray = $requestArray + ["password" => Hash::make($requestArray["password"])];
		} else {

			unset($requestArray["password"]);
		}

		$row->update($requestArray);

		return redirect("/admin/users");
	}

    
}
