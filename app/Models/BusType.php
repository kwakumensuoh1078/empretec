<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BusType
 * 
 * @property int $id
 * @property string|null $business_type
 * @property string|null $bus_desc
 * @property string|null $status
 *
 * @package App\Models
 */
class BusType extends Model
{
	protected $table = 'bus_type';
	public $timestamps = false;

	protected $fillable = [
		'business_type',
		'bus_desc',
		'status'
	];

	
}
