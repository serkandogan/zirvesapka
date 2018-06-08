<?php

namespace App\Models; 

use App\Models\User; 
use Illuminate\Database\Eloquent\Model;
use Input;
use Auth;

class UserRole extends Model {

	protected $table = 'user_role';
	public $timestamps  = false;

	public function user($id, $field = null) {
		$user = User::find($id);
		if (!empty($user)) {
			if ($field <> null) {
				return $user->$field;
			} else {
				return $user->id;
			}
		}
		return FALSE;
	}

	public function controll($indis, $value)
	{
		if (in_array($indis, $value))
			return 1;	
		else
			return 0;
	}

	public static function check($key, $perm, $user, $result = 'checked') {
		$record = UserRole::where('module_name', $key)->where('user_id', $user)->first();
		if (count($record)>0) {
			if ($record->$perm) {
				return $result; 
			} 
		}
		return null;
	}


    public function permissions()
    {
        $records = $this->where('user_id', Auth::User()->id)->get();
        foreach ( $records as $record )
        {
            $this->permissions[$record->module_name][] = $record->permission;
        }
    }
	public function permission( $module, $type, $alert = FALSE )
    {
        if ( Auth::User()->roleType === 10 ) {
            return TRUE;
        }

        if ( isset( $this->permissions[$module] ) && in_array( $type, $this->permissions[$module] ) ) {
            return TRUE;
        }

        if ( $alert === TRUE ) {
            die('alert');
        }
        return FALSE;
    }


    public static function moduleList () {
		return array(
				'brand'				    => 'Markalar',
				'cargo'				    => 'Kargolar',
				'category'			    => 'Kategoriler',
				'gallery'			    => 'Galeri',
				'order'				    => 'Sipariş',
				'product'   		    => 'Ürünler',
				'productfeature'        => 'Ürün Özellikleri',
				'productfeaturelist'    => 'Ürün Özellikleri Değeri',
				'slider'     			=> 'Slider Yönetimi',
				'suplier'    			=> 'Tedarikçiler'
			);

		/**
		 * üyeler ile admin giriş bilgileri aynı
		 * member ve user diye 2 ye ayırrmamıza gerek yok
		 */
	}
}