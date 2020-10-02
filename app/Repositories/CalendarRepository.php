<?php
namespace App\Repositories;
use App\Models\Event;
use App\Models\User;
use App\Repositories\Interfaces\CalendarRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CalendarRepository implements CalendarRepositoryInterface
{
    /**
     * Returns events
     * 
     * @param array $events
     * @param integer $id
     * @param array $data
     * @param array $array
     * 
     * @return array
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
        return $events;  
    }

}