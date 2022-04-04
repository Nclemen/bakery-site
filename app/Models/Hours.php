<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\OpeningHours\OpeningHours;

class Hours extends Model
{
    use HasFactory;


    function __construct(){
        // do smtn
    }

    static function showHours(){
        $openingHours = OpeningHours::create([
            'monday'     => ['08:00-12:00', '12:45-16:00'],
            'tuesday'    => [],
            'wednesday'  => ['08:00-12:00', '12:45-16:00'],
            'thursday'   => [],
            'friday'     => ['08:00-12:00'],
            'saturday'   => [],
            'sunday'     => [],
            'exceptions' => [
                '2016-11-11' => ['09:00-12:00'],
                '2016-12-25' => [],
                '01-01'      => [],                // Recurring on each 1st of January
                '12-25'      => ['09:00-12:00'],   // Recurring on each 25th of December
            ],
        ]);
        return $openingHours;
    }

}
