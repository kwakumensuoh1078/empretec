<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * 
 * @property int $countries_id
 * @property string $continents_code
 * @property string $countries_iso_code_2
 * @property string $countries_iso_code_3
 * @property string $countries_number
 * @property string $countries_name
 * @property int|null $address_format_id
 * @property string|null $region
 * @property string|null $currency_code
 * @property string|null $currency_name
 * @property string|null $currency_symbol
 *
 * @package App\Models
 */
class Country extends Model
{
	protected $table = 'countries';
	protected $primaryKey = 'countries_id';
	public $timestamps = false;

	protected $casts = [
		'address_format_id' => 'int'
	];

	protected $fillable = [
		'continents_code',
		'countries_iso_code_2',
		'countries_iso_code_3',
		'countries_number',
		'countries_name',
		'address_format_id',
		'region',
		'currency_code',
		'currency_name',
		'currency_symbol'
	];
}
