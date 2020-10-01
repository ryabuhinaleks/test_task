<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class CalendarController extends Controller
{
    /**
     * Returns a calendar with events
     * 
     * @param array $events
     * @param integer $id
     * @param array $data
     * @param array $array
     * @param integer $idUser
     * 
     * @return view
     */
    public function show($id)
    {        
        $events=[];
        if($id==1)
        {
            $data=User::find(Auth::user()->id)->event;
        }
        else
            $data=Event::all();
        
        foreach($data as $value)
        {
            $array = array(
                'title' => "$value->title", 
                'color' => "$value->color", 
                'id' => "$value->id", 
                'user_id' => "$value->user_id", 
            );
            if($value->repeat!="no")
            {
                $array['rrule']= "DTSTART:$value->start\nRRULE:FREQ=$value->repeat";
            }
            else
            {
                $array['start']= $value->start;
            }
            $events[] = $array;           
        }   
        return view('calendar',['events'=>$events, 'idUser'=>Auth::user()->id]);
    }
}
