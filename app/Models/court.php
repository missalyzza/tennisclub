<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class court
 * @package App\Models
 * @version March 23, 2020, 4:00 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection bookings
 * @property \Illuminate\Database\Eloquent\Collection courtratings
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function courtratings()
    {
        return $this->hasMany(\App\Models\Courtrating::class, 'courtid');
    }
}
