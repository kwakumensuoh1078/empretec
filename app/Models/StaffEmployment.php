<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StaffEmployment
 * 
 * @property int $id
 * @property string|null $staff_id
 * @property string|null $org
 * @property string|null $position
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $duties_performed
 *
 * @package App\Models
 */
class StaffEmployment extends Model
{
	protected $table = 'staff_employment';
	public $timestamps = false;

	protected $fillable = [
		'staff_id',
		'org',
		'position',
		'start_date',
		'end_date',
		'duties_performed'
	];
}
