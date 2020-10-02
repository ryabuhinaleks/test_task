<?php
namespace App\Repositories\Interfaces;
use App\Models\Event;
use Illuminate\Http\Request;

interface AccountRepositoryInterface
{
    /**
     * Update the specified account in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request);
} 