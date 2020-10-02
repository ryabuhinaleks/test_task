<?php
namespace App\Repositories\Interfaces;
use App\Models\Event;
use Illuminate\Http\Request;

interface CalendarRepositoryInterface
{
    /**
     * Returns events
     * 
     * @param integer $id
     * 
     * @return array
     */
    public function show($id);
} 