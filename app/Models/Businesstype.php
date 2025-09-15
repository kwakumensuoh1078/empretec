<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Businesstype
 * 
 * @property int $id
 * @property int|null $busClassId
 * @property string $name
 * @property string|null $description
 * @property string $status
 * @property int $createdBy
 * @property Carbon $createdOn
 * @property int|null $updatedBy
 * @property Carbon|null $updatedOn
 *
 * @package App\Models
 */
class Businesstype extends Model
{
	protected $table = 'businesstype';
	public $timestamps = false;

	protected $casts = [
		'busClassId' => 'int',
		'createdBy' => 'int',
		'createdOn' => 'datetime',
		'updatedBy' => 'int',
		'updatedOn' => 'datetime'
	];

	protected $fillable = [
		'busClassId',
		'name',
		'description',
		'status',
		'createdBy',
		'createdOn',
		'updatedBy',
		'updatedOn'
	];

	public function getClassification (){

		if(Businessclass::where('id',$this->busClassId)->get()->count() > 0){

			return Businessclass::find($this->busClassId)->name;
		}else{

			return "N?A";
		}
	}
}
