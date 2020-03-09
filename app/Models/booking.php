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
	public static function boot()
	{
		parent::boot();
		self::saving(function($model)
		{
			//figure out who the logged in user is
			$loggedInUser = Auth::user();
			//retrieve the costPerHour based on members of that type
			$costPerHour = $loggedInUser->member->membershiptype->courthourlyfee;
			//get datetime objects for the starttime and endtime - calculate the interval between them
			$startTime = \DateTime::createFromFormat("H:i",$model->starttime);
			$endTime = \DateTime::createFromFormat("H:i",$model->endtime);
			$interval = $endTime->diff($startTime);
			//add up the number of hours, minutes and seconds - express this as a decimal of hours
			//which is rounded to 2 decimal places
			$totalHours = round($interval->s / 3600 + $interval->i / 60 + $interval->h, 2);
			//set the booking fee to be the cost per hour times the totalHours(decimal)
			$model->fee = $costPerHour * $totalHours;    
		});
	}
}
?>