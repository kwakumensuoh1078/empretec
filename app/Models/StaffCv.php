<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StaffCv
 * 
 * @property int $id
 * @property string|null $staff_id
 * @property string|null $school_name
 * @property string|null $cert
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $cv
 * @property string|null $created_on
 * @property string|null $created_by
 *
 * @package App\Models
 */
class StaffCv extends Model
{
	protected $table = 'staff_cv';
	public $timestamps = false;

	protected $fillable = [
		'staff_id',
		'school_name',
		'cert',
		'start_date',
		'end_date',
		'cv',
		'created_on',
		'created_by'
	];
}
