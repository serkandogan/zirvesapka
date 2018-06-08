<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreateMember;
use App\Http\Requests\UpdateMember;
use App\Models\Member;

class MembersController extends AdminController {

	public function index() {

		$members = Member::orderBy('ID', 'DESC')->paginate(50);

		return view('admin.members.index', compact('members'));
	}

	public function create() {
		return view('admin.members.create');
	}

	public function store(CreateMember $input) {
		Member::create($input->all());

		return redirect('admin.admin/members')->with('added', 1);
	}

	public function show($id) {
		$member = Member::find($id);
		return view('admin.members.show', compact('member'));
	}

	public function edit($id) {

		$member      = Member::orderBy('Baslik', 'ASC')->find($id);

		return view('admin.members.edit', compact('member'));

	}

	public function update($id, UpdateMember $input) {

		//dd($input->all());

		Member::find($id)->fill($input->all())->save();

		return redirect('admin.admin/members')->with('updated', 1);
	}

	public function destroy($id) {
		$member = Member::find($id);
		$member->delete();

		return redirect('admin.admin/members')->with('deleted', 1);
	}
}