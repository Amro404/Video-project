<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Messages\Store;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplayContact;
use App\Models\Message;

class Messages extends BackEndController
{
	public function __construct(Message $model)
	{
		parent::__construct($model);

	}

	public function replyMessage($id)
	{
		$message = Message::findOrFail($id);

		return view("back-end.messages.reply", compact("message"));
	}

	public function reply(Store $request, $id)
	{
		$message = $this->model->findOrFail($id);

		Mail::send(new ReplayContact($message, $request->message));

		return redirect()->back();
	}

}
