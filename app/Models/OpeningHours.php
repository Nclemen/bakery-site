<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class OpeningHours extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'open',
        'start_time',
        'end_time',
        'repeated_by',
        'repeat_increment'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;


    /**
     * checks to see if the store is open
     *
     * @return bool
     */
    static function checkIfOpen()
    {
        // the current time
        $timeNow = Carbon::now('Europe/London')->toTimeString();




        // gets the first record with a start time before and an end time after the current time
        $timeResult = OpeningHours::
        where('start_time', '<', $timeNow)->
        where('end_time', '>', $timeNow)->get();

//        $timeResultq1 = DB::table('opening_hours')
//            ->where('start_time', '<', '16:30:00')
//            ->where('end_time', '>', '16:30:00')
//            ->get();
//
//        $timeResultq2 = DB::table('opening_hours')
////            ->where('start_time', '<', $timeNow)
//            ->where('end_time', '>', $timeNow)
//            ->get();
//
//        $timeResultq3 = DB::table('opening_hours')
//            ->where('start_time', '<', $timeNow)
////            ->where('end_time', '>', $timeNow)
//            ->get();

//        dd($timeNow);

//        dd([
//            $timeResultq1,
//            $timeResultq2,
//            $timeResultq3,
//            $timeNow
//        ]);

        //checks to see if the any records were found
        if (is_null($timeResult)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * checks the amount of weeks the date in parameter has with current date
     *
     * @param $date OpeningHours
     * @return void
     */
    private function datediffInWeeks($date)
    {
        $date1 = $date->start_time;
        $date2 = Carbon::now();
        $steps = $date->recurrence_increment;

        if($date1 > $date2) return datediffInWeeks($date2, $date1);
        $first = DateTime::createFromFormat('m/d/Y', $date1);
        $second = DateTime::createFromFormat('m/d/Y', $date2);
        $weekAmount = floor($first->diff($second)->days/7);

        If( floor($weekAmount/$steps) == ($weekAmount/$steps) ){
            return $date;
        }
    }

    /**
     * @param $date1 date  first date to compare
     * @param $date2 date  second date to compare
     * @return string
     */
    static function datediffInDays($date1, $date2)
    {
        //turns $date1 & $date2 into datetime objects
        $origin = date_create($date1);
        $target = date_create($date2);

        //get the difference in days between the 2 dates
        $interval = date_diff($origin, $target);

        return $interval->format('%d');
    }

    /**
     * @return string
     */
    public function getDayOfTheWeek(){
        // the days of the week
        $days = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday',
        ];

        // get the number of the day of the week based on the date passed
        $weekday = getdate(strtotime($this->created_at))['wday'];

        // returns the result of $weekday as string
        return $days[($weekday-1)];
    }

    /**
     * @return mixed
     */
    static function getNextMomentOpen(){
        // the current time
        $timeNow = Carbon::now()->toTimeString();

        // gets the first record with a start time after the current time
        $nextMoment = OpeningHours::where([
            ['start_time', '>', $timeNow],
            ])->orderBy('name', 'desc')->first();

        return $nextMoment;
    }

    /**
     * @param $weekday string the weekday for which you want the hours for
     * @return mixed
     */
    static function getHoursForWeekDay($weekday = 'wednesday'){

        $day_of_week = [
          'sunday' => 1,
          'monday' => 2,
          'tuesday'=> 3,
          'wednesday' => 4,
          'thursday' => 5,
          'friday' => 6,
          'saturday' => 7
        ];

        $hours = OpeningHours::where(DB::raw("DAYOFWEEK(created_at)"), $day_of_week[$weekday]->orderBy('start_time')->get());

        return $hours;
    }
}
