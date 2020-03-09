<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class court
 * @package App\Models
 * @version February 17, 2020, 2:43 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection bookings
 * @property string surface
 * @property boolean floodlights
 * @property boolean indoor
 */
class court extends Model
{

    public $table = 'court';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'surface',
        'floodlights',
        'indoor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'surface' => 'string',
        'floodlights' => 'boolean',
        'indoor' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class, 'courtid');
    }
	public function __toString()
	{
		if ($this->floodlights){
			return $this->id . " " . $this->surface . " " . "has floodlights";
		}
		else {
			return $this->id . " " . $this->surface . " " . "has no floodlights";
		}
	}
}
