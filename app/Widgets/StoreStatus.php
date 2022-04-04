<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Hours;
use Carbon\Carbon;
use DateTime;

class StoreStatus extends AbstractWidget
{
    /**
     * The number of seconds before each reload.
     *
     * @var int|float
     */
    public $reloadTimeout = 1;

    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'count'
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $status = Hours::showHours()->isOpen();

        if(!$status){
           
            $data = Carbon::now()->diffForHumans(Hours::showHours()->nextOpen(), ['parts' => 1]);

            $text =  $data . ' the store is open';
            
            $status = $text;
        } else {
            $status = 'open';
        }

        return view('widgets.store_status', [
            'config' => $this->config,
            'timeUntil' => $status,
            'nextOpen' => Hours::showHours()->nextOpen(),
        ]);
    }
}
