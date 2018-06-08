<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreatePage;
use App\Http\Requests\UpdatePage;
use App\Models\Email;
use App\Models\Page;
use Input;
use Validator;

class EmailController extends AdminController {

	public function getIndex() {
		$email = Email::orderBy('id', 'DESC')->paginate(50);
		return view('admin.email.index', compact('email'));
	}

	public function getDelete($id ) {
		$email = Email::find($id);
		$email->delete();
		return redirect('admin/email')->with('deleted', 1);
	}
}