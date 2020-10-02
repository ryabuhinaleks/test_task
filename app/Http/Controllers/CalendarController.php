<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CalendarRepository;

class CalendarController extends Controller
{

    protected $calendarRepository;

    public function __construct(CalendarRepository $calendarRepository)
    {
        $this->calendarRepository = $calendarRepository;
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
        $events=$this->calendarRepository->show($id);
        return view('calendar',['events'=>$events, 'idUser'=>Auth::user()->id]);
    }
}
