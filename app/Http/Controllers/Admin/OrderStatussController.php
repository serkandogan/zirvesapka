<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreateOrderStatus;
use App\Http\Requests\UpdateOrderStatus;
use App\Models\OrderStatus;

class OrderStatussController extends AdminController {

	public function index() {

		$orderstatuss = OrderStatus::orderBy('ID', 'DESC')->paginate(50);

		return view('admin.orderstatuss.index', compact('orderstatuss'));
	}

	public function create() {
		return view('admin.orderstatuss.create');
	}

	public function store(CreateOrderStatus $input) {
		OrderStatus::create($input->all());

		return redirect('admin.admin/orderstatuss')->with('added', 1);
	}

	public function show($id) {
		$orderstatus = OrderStatus::find($id);
		return view('admin.orderstatuss.show', compact('orderstatus'));
	}

	public function edit($id) {

		$orderstatus      = OrderStatus::orderBy('Baslik', 'ASC')->find($id);

		return view('admin.orderstatuss.edit', compact('orderstatus'));

	}

	public function update($id, UpdateOrderStatus $input) {

		//dd($input->all());

		OrderStatus::find($id)->fill($input->all())->save();

		return redirect('admin.admin/orderstatuss')->with('updated', 1);
	}

	public function destroy($id) {
		$orderstatus = OrderStatus::find($id);
		$orderstatus->delete();

		return redirect('admin.admin/orderstatuss')->with('deleted', 1);
	}
}