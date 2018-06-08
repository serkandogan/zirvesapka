<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Product;
use App\Models\Transfer;
use App\Models\Transferform;
use Input;
use Validator;

class TransferFormController extends AdminController {

	public function getIndex() {
		$form = Transferform::with(['product','bank'])->where('type','=','1')->orderBy('id', 'DESC')->paginate(50);
		$product  = Product::all();
		$bank = Transfer::all();
		return view('admin.transferform.index', compact('form','product','bank'));
	}
	public function getKapida() {
		$kapidaodeme = Transferform::where('type','=','2')->orderBy('id', 'DESC')->paginate(50);
		$product  = Product::all();
		$bank = Transfer::all();
		return view('admin.paymentdoor.index', compact('kapidaodeme','product','bank'));
	}

	public function postUpdate($id)
	{
		$validator = Validator::make(Input::all(), ['active' => 'required']);
		$validator_message = $validator->messages()->first();
		if ($validator->fails())
		{
			return redirect()->back()->withMessage($validator_message);
		}

		$add = Transferform::find($id);
		$add->active = 1;
		if ($add->save())
		{
			return redirect()->back();
		} else
		{
			return redirect()->back()->withMessage('Ürün Eklenemedi');
		}
	}

	public function postUpdate2($id)
	{
		$validator = Validator::make(Input::all(), ['active' => 'required']);
		$validator_message = $validator->messages()->first();
		if ($validator->fails())
		{
			return redirect()->back()->withMessage($validator_message);
		}

		$add = Transferform::find($id);
		$add->active = 0;
		if ($add->save())
		{
			return redirect()->back();
		} else
		{
			return redirect()->back()->withMessage('Ürün Eklenemedi');
		}
	}
	public function getDestroy($id) {
		$product = Transferform::find($id);
		$product->delete();

		return redirect()->back()->with('deleted', 1);
	}
}