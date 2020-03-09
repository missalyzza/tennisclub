<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class booking
 * @package App\Models
 * @version February 17, 2020, 2:43 pm UTC
 *
 * @property \App\Models\Member memberid
 * @property \App\Models\Court courtid
 * @property string bookingdate
 * @property time starttime
 * @property time endtime
 * @property integer memberid
 * @property integer courtid
 * @property number fee
 */
class booking extends Model
{

    public $table = 'booking';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'bookingdate',
        'starttime',
        'endtime',
        'memberid',
        'courtid',
        'fee'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'bookingdate' => 'date',
        'memberid' => 'integer',
        'courtid' => 'integer',
        'fee' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function memberid()
    {
        return $this->belongsTo(\App\Models\Member::class, 'memberid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function courtid()
    {
        return $this->belongsTo(\App\Models\Court::class, 'courtid');
    }
}
