<?php

namespace App\Http\Controllers;

use App\Statuses;
use Illuminate\Http\Request;

class StatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statuses  $statuses
     * @return \Illuminate\Http\Response
     */
    public function show(Statuses $statuses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statuses  $statuses
     * @return \Illuminate\Http\Response
     */
    public function edit(Statuses $statuses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statuses  $statuses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statuses $statuses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statuses  $statuses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statuses $statuses)
    {
        //
    }

    public function remove(Product $product)
    {
        //метода, выводящего пользовательский интерфейс для удаления кортежа
    }
}
