<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;
use App\Models\GalleryGroup;

class Comment extends Model {

	protected $table = 'comments';

	protected $primaryKey = 'id';

	public $timestamps  = false;
	protected $fillable = ['name', 'comment','active'];
	// protected $guarded = [];

	public function category() {
		return $this->belongsTo(Category::class, 'KategoriID', 'ID');
	}

}
