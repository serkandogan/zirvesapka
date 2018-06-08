<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use Input;
use Validator;

class CommentsController extends Controller {

	public function getIndex() {
		$comments = Comment::orderBy('ID', 'DESC')->paginate(50);
		return view('admin.comments.index', compact('comments'));
	}


	public function getUpdate($id){
		$comment = Comment::find($id);
		return view('admin.comments.edit', compact('comment'));
	}

	public function postUpdate($id)
	{

		$validator = Validator::make(Input::all(), ['active' => 'required']);
		$validator_message = $validator->messages()->first();
		if ($validator->fails()){
			return redirect()->back()->withMessage($validator_message);
		}

		$add = Comment::find($id);
		$add->active 			= 1;
		$add->save();
		if ($add->save())
		{
			return redirect('admin/comment');
		} else
		{
			return redirect()->back()->withMessage('Ürün Eklenemedi');
		}
		return redirect('admin/comment/create');
	}

	public function getDestroy($id ) {
        $record = Comment::find($id);
        $record->delete();
		return redirect('admin/comment')->with('deleted', 1);
	}
}