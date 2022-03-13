<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepenyeliaRequest;
use App\Http\Requests\UpdatepenyeliaRequest;
use App\Models\penyelia;

class PenyeliaController extends Controller
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
     * @param  \App\Http\Requests\StorepenyeliaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepenyeliaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penyelia  $penyelia
     * @return \Illuminate\Http\Response
     */
    public function show(penyelia $penyelia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penyelia  $penyelia
     * @return \Illuminate\Http\Response
     */
    public function edit(penyelia $penyelia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepenyeliaRequest  $request
     * @param  \App\Models\penyelia  $penyelia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepenyeliaRequest $request, penyelia $penyelia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penyelia  $penyelia
     * @return \Illuminate\Http\Response
     */
    public function destroy(penyelia $penyelia)
    {
        //
    }
}
