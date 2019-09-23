<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller
{
	protected $model;

    public function __construct(Model $model)
    {
    	$this->model = $model;

    }

    public function index()
	{
		$rows = $this->model;

		$with = $this->with();

		if(!empty($with)) {
			$rows = $rows->with($with);
		}

		$rows = $rows->paginate(10);


		$mduleName = $this->pluralModelName();
		$sMduleName = $this->getModelName();
		$routeName = $this->getClassNameFromModel();
		$pageTitle = "Control " . $mduleName;
		$pageDesc = "Here you can add / edit / delete " .  $mduleName;
		
   		return view("back-end." . $this->getClassNameFromModel() . ".index", compact(
   			"rows",
   			"mduleName",
   			"sMduleName",
   			"routeName",
			"pageTitle",
			"pageDesc"
   		));
	}

	public function create()
	{
		$mduleName = $this->getModelName();
		$pageTitle = "Create " . $mduleName;
		$pageDesc = "Here you can add " .  $mduleName;
		$folderName = $this->getClassNameFromModel();
		$routeName = $folderName;
		$append = $this->append();

		return view("back-end." . $folderName . ".create", compact(
			"mduleName",
			"pageTitle",
			"pageDesc",
			"folderName",
			"routeName"
			
		))->with($append);
	}

	public function edit($id)
	{
		$row = $this->model->findOrFail($id);

		$mduleName = $this->getModelName();
		$pageTitle = "Edit " . $mduleName;
		$pageDesc = "Here you can edit " .  $mduleName;
		$folderName = $this->getClassNameFromModel();
		$routeName = $folderName;
		$append = $this->append();

		return view("back-end." . $folderName . ".edit", compact(
			"row",
			"mduleName",
			"pageTitle",
			"pageDesc",
			"folderName",
			"routeName"

		))->with($append);
	}

	public function destroy($id)
	{
		$row = $this->model->findOrFail($id)->delete();

		return redirect()->back();
	}

	protected function with()
	{
		return [];
	}

	protected function append()
	{
		return [];
	}
	protected function getClassNameFromModel()
	{
		return str_plural(strtolower($this->getModelName()));
	}

	protected function pluralModelName()
	{
		return str_plural($this->getModelName());
	}

	protected function getModelName()
	{
		return class_basename($this->model);
	}

}
