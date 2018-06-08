<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;
use App\Models\GalleryGroup;

class Video extends Model {
	protected $table = 'video';
	protected $primaryKey = 'id';
	public $timestamps  = false;
	protected $fillable = ['name', 'refurl', 'embed'];
}
