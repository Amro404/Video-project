<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Comments\Store;
use App\Models\Comment;

trait CommentTrait
{

	public function commentStore(Store $request)
	{
		
		$requestArray = $request->all() + ["user_id" => auth()->user()->id];

		Comment::create($requestArray);

		return redirect()->back();

	}

	public function commentUpdate(Store $request, $id)
	{
		$row = Comment::findOrFail($id);
		
		$row->update($request->all());

		return redirect()->back();
	}

	public function commentDelete($id)
	{
		$row = Comment::findOrFail($id)->delete();

		return redirect()->back();
	}

}