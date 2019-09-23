<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Comment;

class Home extends BackEndController 
{
	public function __construct(Comment $model)
	{
		parent::__construct($model);

	}


    public function index(){

    	$comments = Comment::orderBy("id", "DESC")->paginate(20);

    	return view("back-end.home", compact("comments"));
    }

}
