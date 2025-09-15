<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StaffCapacity
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $class_id
 * @property string|null $type_id
 * @property string|null $country_id
 * @property string|null $description
 * @property string|null $objective
 *
 * @package App\Models
 */
class StaffCapacity extends Model
{
	protected $table = 'staff_capacity';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'class_id',
		'type_id',
		'country_id',
		'description',
		'objective'
	];
}
