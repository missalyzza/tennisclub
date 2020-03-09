<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class member
 * @package App\Models
 * @version March 9, 2020, 4:07 pm UTC
 *
 * @property \App\Models\Membershiptype membertype
 * @property \App\Models\User userid
 * @property \Illuminate\Database\Eloquent\Collection bookings
 * @property string firstname
 * @property string surname
 * @property string membertype
 * @property string dateofbirth
 * @property integer userid
 */
class member extends Model
{

    public $table = 'member';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'firstname',
        'surname',
        'membertype',
        'dateofbirth',
        'userid'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'firstname' => 'string',
        'surname' => 'string',
        'membertype' => 'string',
        'dateofbirth' => 'date',
        'userid' => 'integer'
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
    public function membertype()
    {
        return $this->belongsTo(\App\Models\Membershiptype::class, 'membertype');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userid()
    {
        return $this->belongsTo(\App\Models\User::class, 'userid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class, 'memberid');
    }
}
