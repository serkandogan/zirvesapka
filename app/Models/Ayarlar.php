<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ayarlar extends Model {

	protected $table = 'ayarlar';

	protected $primaryKey = 'id';

	public $timestamps  = false; 
	// protected $guarded = [];


	public static function get($name)
	{
		$record = self::where('name', $name)->first();
		if ( count($record)>0 ) {
			return $record->value;
		} 
		return FALSE;
	}

	public static function set($name, $value) 
	{
		$record = self::where('name', $name)->first();
		if ( count($record)>0 ) {
			if ( !empty($value) ) {
				$record->value = $value;
				$record->save();
				if ($record->save())
					return true;
					
			}
		} 
		return FALSE;
	}

}
