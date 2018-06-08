<?php 

namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
* Save Category Request Classes
*/
class SaveCategory extends Request
{
	
	public function authorize()	{
		return true;	
	}


	public function rules(){
		return [];
	}
}