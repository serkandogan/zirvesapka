<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Transfer;
use Input;
use Validator;

class TransferController extends AdminController {

	public function getIndex() {
		$pages = Transfer::orderBy('id', 'DESC')->paginate(50);
		return view('admin.transfer.index', compact('pages'));
	}

	public function getCreate () {
		return view('admin.transfer.create');
	}

	public function postCreate () {
		$validator = Validator::make(Input::all(), ['name'=>'required']);
		$messages = $validator->messages();
		if ($validator->fails())  {
			return redirect()->back()->with('noadded', 1)->withInput(); 
		}
		$record = new Transfer;
		$record->name = Input::get('name');
		$record->kind = Input::get('kind');
		$record->account_name = Input::get('account_name');
		$record->branch_name = Input::get('branch_name');
		$record->branch_code = Input::get('branch_code');
		$record->account_number = Input::get('account_number');
		$record->iban = Input::get('iban');
		$record->save();
		if ($record->save()) {
			return redirect(url('admin/transfer'))->with('added',1);
		}else{
			return redirect()->back()->with('noadded', 1)->withInput(); 
		}
	}
	public function getUpdate($id){
		$pageupdate = Transfer::find($id);
		return view('admin.transfer.edit', compact('pageupdate'));
	}
	public function postUpdate($id){
		$validator = Validator::make(Input::all(), ['name'=>'required']);
		$validator_message = $validator->messages();
		if ($validator->fails()) {
			return redirect()->back()->with('noupdated', 1)->withInput();
		}
		$pageupdate = Transfer::find($id);
		$pageupdate->name = Input::get('name');
		$pageupdate->kind = Input::get('kind');
		$pageupdate->account_name = Input::get('account_name');
		$pageupdate->branch_name = Input::get('branch_name');
		$pageupdate->branch_code = Input::get('branch_code');
		$pageupdate->account_number = Input::get('account_number');
		$pageupdate->iban = Input::get('iban');
		$pageupdate->save();
		if ($pageupdate->save()) {
			return redirect('admin/transfer')->with('updated', 1);
		} else {
			return redirect('admin/transfer/edit/'.$pageupdate->id)->with('noupdated', 1);
		}
	}

	public function getDelete($id ) {
		$page = Transfer::find($id);
		$page->delete();
		return redirect('admin/transfer')->with('deleted', 1);
	}
}