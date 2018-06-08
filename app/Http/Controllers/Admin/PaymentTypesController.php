<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreatePaymentType;
use App\Http\Requests\UpdatePaymentType;
use App\Models\PaymentType;

class PaymentTypesController extends AdminController {

	public function index() {

		$paymenttypes = PaymentType::orderBy('ID', 'DESC')->paginate(50);

		return view('admin.paymenttypes.index', compact('paymenttypes'));
	}

	public function create() {
		return view('admin.paymenttypes.create');
	}

	public function store(CreatePaymentType $input) {
		PaymentType::create($input->all());

		return redirect('admin.admin/paymenttypes')->with('added', 1);
	}

	public function show($id) {
		$paymenttype = PaymentType::find($id);
		return view('admin.paymenttypes.show', compact('paymenttype'));
	}

	public function edit($id) {

		$paymenttype      = PaymentType::orderBy('Baslik', 'ASC')->find($id);

		return view('admin.paymenttypes.edit', compact('paymenttype'));

	}

	public function update($id, UpdatePaymentType $input) {

		//dd($input->all());

		PaymentType::find($id)->fill($input->all())->save();

		return redirect('admin.admin/paymenttypes')->with('updated', 1);
	}

	public function destroy($id) {
		$paymenttype = PaymentType::find($id);
		$paymenttype->delete();

		return redirect('admin.admin/paymenttypes')->with('deleted', 1);
	}
}