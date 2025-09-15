<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $purpose
 * @property string|null $responsibility
 * @property string|null $status
 *
 * @package App\Models
 */
class Department extends Model
{
	protected $table = 'department';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'description',
		'purpose',
		'responsibility',
		'status'
	];
}
