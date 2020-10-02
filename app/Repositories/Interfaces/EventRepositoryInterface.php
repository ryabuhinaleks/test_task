<?php
namespace App\Repositories\Interfaces;
use App\Models\Event;
use Illuminate\Http\Request;

interface EventRepositoryInterface
{
    public function show($id);

    public function store(Request $request);

    public function getbyEvent($id);

    public function update($id, Request $request);

    public function delete($id);
} 