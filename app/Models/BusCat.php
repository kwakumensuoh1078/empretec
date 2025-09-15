<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BusCat
 * 
 * @property int $id
 * @property string|null $category
 * @property string|null $description
 * @property string|null $created_by
 * @property string|null $status
 *
 * @package App\Models
 */
class BusCat extends Model
{
	protected $table = 'bus_cat';
	public $timestamps = false;

	protected $fillable = [
		'category',
		'description',
		'created_by',
		'status'
	];
}
