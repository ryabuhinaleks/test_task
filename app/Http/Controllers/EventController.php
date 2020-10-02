<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Repositories\EventRepository;

class EventController extends Controller
{
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Display a listing of the event.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created event
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customMessages = [
            'required' => 'Заполните поле',
            'min' => 'Заполните поле'
        ];
        $this->validate($request, [
            'title' => 'required',
            'start' => 'required',
            'color' => 'required',
            'repeat' => 'min:2',
        ],$customMessages);
        
        $this->eventRepository->store($request);
    }

    /**
     * Display the specified event
     *
     * @param  int  $id
     * @param  array  $dataUser
     * @return view
     */
    public function show($id)
    {
        $dataUser = $this->eventRepository->show($id);
        return view('information',['dataUser'=>$dataUser]); 
    }

    /**
     * Show the form for editing the specified event
     *
     * @param  int  $id
     * @param  array  $updateEvent
     * @return view
     */
    public function edit($id)
    {
        $updateEvent=$this->eventRepository->getbyEvent($id);
        return view('update',['dataEvent' =>  $updateEvent]);
    }

    /**
     * Update the specified event
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'start' => 'required',
        ],['required' => 'Заполните поле']);
        
        $this->eventRepository->update($id,$request);
    }

    /**
     * Delete the specified event
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->eventRepository->delete($id);
    }
}
