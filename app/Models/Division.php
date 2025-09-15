<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Division
 * 
 * @property int $id
 * @property string|null $dept_id
 * @property string|null $div_name
 * @property string|null $function
 * @property string|null $other
 * @property string|null $status
 *
 * @package App\Models
 */
class Division extends Model
{
	protected $table = 'division';
	public $timestamps = false;

	protected $fillable = [
		'dept_id',
		'div_name',
		'function',
		'other',
		'status'
	];
}
