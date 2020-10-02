<?php
namespace App\Repositories;
use App\Models\Event;
use App\Repositories\Interfaces\EventRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventRepository implements EventRepositoryInterface
{
    public function show($id)
    {
        $event=Event::find($id);
        $data[]=$event;
        $data[]=$event->user;
        return $data;
    }

    public function store(Request $request)
    {
        $dataEvent= $request->all();
        $dataEvent['user_id']=Auth::User()->id;
        Event::create($dataEvent);
    }

    public function getbyEvent($id)
    {      
        return Event::find($id);
    }

    public function update($id, Request $request)
    {
        Event::find($id)->update($request->all());
    }

    public function delete($id)
    {
        Event::find($id)->delete();
    }


}