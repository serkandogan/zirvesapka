<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreateGroup;
use App\Http\Requests\UpdateGroup;
use App\Models\Group;

class GroupsController extends AdminController {

	public function index() {

		$groups = Group::orderBy('ID', 'DESC')->paginate(50);

		return view('admin.groups.index', compact('groups'));
	}

	public function create() {
		return view('admin.groups.create');
	}

	public function store(CreateGroup $input) {
		Group::create($input->all());

		return redirect('admin/groups')->with('added', 1);
	}

	public function show($id) {
		$group = Group::find($id);
		return view('admin.groups.show', compact('group'));
	}

	public function edit($id) {

		$group      = Group::orderBy('Baslik', 'ASC')->find($id);

		return view('admin.groups.edit', compact('group'));

	}

	public function update($id, UpdateGroup $input) {

		//dd($input->all());

		Group::find($id)->fill($input->all())->save();

		return redirect('admin/groups')->with('updated', 1);
	}

	public function destroy($id) {
		$group = Group::find($id);
		$group->delete();

		return redirect('admin/groups')->with('deleted', 1);
	}
}