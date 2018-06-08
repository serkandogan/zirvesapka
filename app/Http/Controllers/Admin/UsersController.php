<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;
use App\Models\User;
use App\Models\UserRole;
use Input;
use Validator;
use Session; 

class UsersController extends AdminController {

	public function getIndex() {
		$users = User::orderBy('ID', 'DESC')->paginate(50);
		return view('admin.users.index', compact('users'));
	}

	public function getCreate () {
		return view('admin.users.create');
	}

	public function postCreate () {
		$validator = Validator::make(Input::all(),User::$rules);
		$messages = $validator->messages();
		if ($validator->fails())  {
			return redirect()->back()->with('noadded', 1)->withInput(); 
		}
		$record = new User;
		$record->name = Input::get('name');
		$record->roleType = Input::get('roleType');
		$record->password = bcrypt(Input::get('password'));
		$record->email = Input::get('email');
		$record->save();
		if ($record->save()) {
			return redirect(url('admin/users'))->with('added',1);
		}else{
			return redirect()->back()->with('noadded', 1)->withInput(); 
		}
	}
	public function getUpdate($id){
		$record = User::find($id);
		return view('admin.users.edit', compact('record'));
	}
	public function postUpdate($id){
		$validator = Validator::make(Input::all(), ['name'=>'required', 'email'=>'required']);
		$validator_message = $validator->messages();
		if ($validator->fails()) {
			return redirect()->back()->with('noupdated', 1)->withInput();
		}
		$record = User::find($id);
		$record->name = Input::get('name');
		$record->email = Input::get('email');
		if (Input::has('password')) {
			$record->password = bcrypt(Input::get('password'));
			$record->save();
		}
		$record->roleType = Input::get('roleType');
		$record->save();
		if ($record->save()) {
			return redirect('admin/users')->with('updated', 1);
		} else {
			return redirect('admin/users/edit/'.$record->id)->with('noupdated', 1);
		}
	}
	public function getRoleupdate($id) {
		$record = User::find($id);
		$permission = UserRole::all();
		$moduleList = UserRole::moduleList();
		return view('admin.users.role', compact('record','moduleList', 'permission'));
	}
	public function postRoleupdate($id) {
		$record = User::findOrFail($id);
		$lists = UserRole::where('user_id', $record->id)->get();
		if (count($lists)>0) {
			foreach ($lists as $key => $update) {
				$update->list = 0;
				$update->add = 0;
				$update->edit = 0;
				$update->delete = 0;
				$update->save();
			} 
		}
		$return = false;
		if (!empty(Input::get('perm'))) {
			foreach (Input::get('perm') as $key => $value) {			
				$controll = UserRole::where('module_name', $key)->where('user_id', $record->id)->first();
				if (count($controll)<1) { 
					$add = new UserRole;
					$add->user_id = $record->id;
					$add->module_name = $key;
					$add->list = $add->controll("list", $value);
					$add->edit = $add->controll("edit", $value);
					$add->add = $add->controll("add", $value);
					$add->delete = $add->controll("delete", $value);
					$add->save();
					if ($add->save()) {
						$return = true;
					} else {
						$return = false;
					}
				} else {
					$controll->list = $controll->controll("list", $value);
					$controll->edit = $controll->controll("edit", $value);
					$controll->add = $controll->controll("add", $value);
					$controll->delete = $controll->controll("delete", $value);
					$controll->save();
					if ($controll->save()) {
						$return = true;
					} else {
						$return = false;
					}
				} 
			} 
		}
		if ($return) {
			return redirect('admin/users/roleupdate/'.$record->id);
		} else {
			return redirect()->back();
		}
	}
	public function getDelete($id ) {
		$user = User::find($id);
		$user->delete();
		return redirect('admin/users')->with('deleted', 1);
	}
}