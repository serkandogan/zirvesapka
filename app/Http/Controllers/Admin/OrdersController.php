<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Requests\CreateOrder;
use App\Http\Requests\UpdateOrder;
use App\Models\CityTown;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\UserAdres;
use App\Models\User;
use App\Models\City;
use App\Models\Variation;

class OrdersController extends AdminController {

	public function getIndex() {
		$orders = Order::orderBy('ID', 'DESC')->paginate(50);
		return view('admin.orders.index', compact('orders'));
	}

	public function getCreate() {
		return view('admin.orders.create');
	}

	public function store(CreateOrder $input) {
		Order::create($input->all());
		return redirect('admin/orders')->with('added', 1);
	}

	public function getShow($id) {
		$order= Order::with(['orderdetail','useradres','user'])->find($id);
		$adres=UserAdres::where('user_id','=',$order->UyeID)->first();

		$il=City::where('ID','=',$order->IlID)->first();
		$ilce=CityTown::where('ID','=',$order->IlceID)->first();


		$orderdetail  = OrderDetail::where('SiparisID','=',$order->ID)->orderBy('Baslik', 'ASC')->get();
		$urun = Product::where('ID',$order->orderdetail['UrunID'])->orderBy('Baslik', 'ASC')->first();


		return view('admin.orders.show', compact('order', 'orderdetail','totalPrice','urun','users','adres','il','ilce'));
	}

	public function edit($id) {

		$order      = Order::orderBy('Baslik', 'ASC')->find($id);

		return view('admin.orders.edit', compact('order'));

	}

	public function update($id, UpdateOrder $input) {

		//dd($input->all());

		Order::find($id)->fill($input->all())->save();

		return redirect('admin/orders')->with('updated', 1);
	}

	public function getDestroy($id) {
		$order = Order::find($id);
		$order->delete();

		return redirect('admin/orders')->with('deleted', 1);
	}
}