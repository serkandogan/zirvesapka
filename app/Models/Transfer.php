<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model {

	protected $table = 'transfer';

	protected $primaryKey = 'id';

	public $timestamps  = false;
	protected $fillable = ['name', 'kind', 'account_name','branch_name', 'branch_code','account_number'];

}
