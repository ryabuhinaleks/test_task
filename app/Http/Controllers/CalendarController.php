<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\CalendarRepositoryInterface;

class CalendarController extends Controller
{

    protected $calendarInterface;

    public function __construct(CalendarRepositoryInterface $calendarInterface)
    {
        $this->calendarInterface = $calendarInterface;
    }

    /**
     * Returns a calendar with events
     * 
     * @param array $events
     * @param integer $id
     * @param integer $idUser
     * 
     * @return view
     */
    public function show($id)
    {        
        return view('calendar',['events'=>$this->calendarInterface->show($id), 'idUser'=>Auth::user()->id]);
    }
}
