<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\UpdateOrder;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderDetailsController extends AdminController {

	public function index() {

		$orderdetails = Order::orderBy('ID', 'DESC')->paginate(50);

		return view('admin.orderdetails.index', compact('orderdetails'));
	}

	public function create() {
		return view('admin.orderdetails.create');
	}

	public function store(CreateOrderDetail $input) {
		OrderDetail::create($input->all());

		return redirect('admin/orderdetails')->with('added', 1);
	}

	public function show($id) {
		$order       = Order::with(['orderdetail'])->find($id);
		$orderdetail = OrderDetail::where('id', $id)->get();

		return view('admin.orders.edit', compact('order', 'orderdetail'));
	}

	public function edit($id) {

		$order = Order::orderBy('Baslik', 'ASC')->find($id);

		return view('admin.orders.edit', compact('order'));

	}

	public function update($id, UpdateOrder $input) {

		//dd($input->all());

		Order::find($id)->fill($input->all())->save();

		return redirect('admin/orders')->with('updated', 1);
	}

	public function destroy($id) {
		$order = Order::find($id);
		$order->delete();

		return redirect('admin/orders')->with('deleted', 1);
	}
}