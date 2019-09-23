<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Videos\Store;
use App\Http\Requests\BackEnd\Videos\Update;

use App\Models\Video;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;

class Videos extends BackEndController
{
	use CommentTrait;

   	public function __construct(Video $model)
	{
		parent::__construct($model);

	}

	protected function with()
	{
		return ["category", "user"];
	}

	protected function append()
	{
		$array = [
			"categories" => Category::get(),
			"skills" => Skill::get(),
			"tags" => Tag::get(),
			"selectedSkills" => [],
			"selectedTags" => [],
			"comments" => []
		];

		if(request()->route()->parameter("video")) {

			$array["selectedSkills"] = $this->model->find(request()->route()->parameter("video"))->skills()->pluck("skills.id")->toArray();

			$array["selectedTags"] = $this->model->find(request()->route()->parameter("video"))->tags()->pluck("tags.id")->toArray();

			$array["comments"] = $this->model->find(request()->route()->parameter("video"))->comments()->orderBy("id", "DESC")->with("user")->get();
		}



		return $array;
	}

	public function store(Store $request)
	{
	

		$imageName =  $this->uploadImage($request);

		$requestArray =  ["user_id" => auth()->user()->id, 'image' => 'uploads/' . $imageName] +  $request->all(); // need to imageName

		$row = $this->model->create($requestArray);

		$this->syncTagsSkills($row, $requestArray);

        return redirect("/admin/videos");
	}

	public function update(Update $request, $id)
	{

		$requestArray = $request->all();

		if (isset($request->image)) {

			$imageName =  $this->uploadImage($request);
			
       	 	$requestArray = ["image" => "uploads/" . $imageName] + $requestArray;
		}

		$row = $this->model->findOrFail($id);
		
		$row->update($requestArray);

		$this->syncTagsSkills($row, $requestArray);

		return redirect("/admin/videos");
	}

	protected function syncTagsSkills($row, $requestArray)
	{

		if(isset($requestArray["skills"]) && !empty($requestArray["skills"])) {
			$row->skills()->sync($requestArray["skills"]);
		}

		if(isset($requestArray["tags"]) && !empty($requestArray["tags"])) {
			$row->tags()->sync($requestArray["tags"]);
		}
	}

	protected function uploadImage($request)
	{
		$file = $request->image;

		$imageName = time() . $file->getClientOriginalName();

        $file->move("uploads", $imageName);

        return $imageName;
	}
}
