<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
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
            
        $dataEvent= $request->all();
        $dataEvent['user_id']=Auth::User()->id;
        Event::create($dataEvent);
    }

    /**
     * Display the specified event
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data[]=Event::find($id);
        $data[]=Event::find($id)->user;
        return view('information',['dataUser'=>$data]); 
    }

    /**
     * Show the form for editing the specified event
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('update',['dataEvent' => Event::find($id)]);
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
        
        Event::find($id)->update($request->all());
    }

    /**
     * Delete the specified event
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
    }
}
