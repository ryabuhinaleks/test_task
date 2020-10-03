<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\EventRepositoryInterface;

class EventController extends Controller
{
    protected $eventInterface;

    public function __construct(EventRepositoryInterface $eventInterface)
    {
        $this->eventInterface = $eventInterface;
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
     * @return view
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created event
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
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
        
        $this->eventInterface->store($request);
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
        return view('information',['dataUser'=>$this->eventInterface->show($id)]); 
    }

    /**
     * Show the form for editing the specified event
     *
     * @param  int  $id
     * @param  array  $dataEvent
     * @return view
     */
    public function edit($id)
    {
        return view('update',['dataEvent' =>  $this->eventInterface->getbyEvent($id)]);
    }

    /**
     * Update the specified event
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'start' => 'required',
        ],['required' => 'Заполните поле']);
        
        $this->eventInterface->update($id,$request);
    }

    /**
     * Delete the specified event
     *
     * @param  int  $id
     * @return void
     */
    public function destroy($id)
    {
        $this->eventInterface->delete($id);
    }
}
