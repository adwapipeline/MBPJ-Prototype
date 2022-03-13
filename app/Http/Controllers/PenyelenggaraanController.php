<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepenyelenggaraanRequest;
use App\Http\Requests\UpdatepenyelenggaraanRequest;
use App\Models\penyelenggaraan;

class PenyelenggaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyelenggaraan = Penyelenggaraan::all();
        return view('penyelenggaraan.index', compact('penyelenggaraan'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penyelenggaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepenyelenggaraanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepenyelenggaraanRequest $request)
    {
        $penyelenggaraan = penyelenggaraan::create($request->all());
        return redirect()->route('penyelenggaraan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penyelenggaraan  $penyelenggaraan
     * @return \Illuminate\Http\Response
     */
    public function show(penyelenggaraan $penyelenggaraan)
    {
        return view('penyelenggaraan.show', compact('penyelenggaraan'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penyelenggaraan  $penyelenggaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(penyelenggaraan $penyelenggaraan)
    {
        return view('penyelenggaraan.edit',compact('penyelenggaraan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepenyelenggaraanRequest  $request
     * @param  \App\Models\penyelenggaraan  $penyelenggaraan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepenyelenggaraanRequest $request, penyelenggaraan $penyelenggaraan)
    {
        $penyelenggaraan->update($request->all());
        return redirect()->route('penyelenggaraan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penyelenggaraan  $penyelenggaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(penyelenggaraan $penyelenggaraan)
    {
        $penyelenggaraan->delete();

        return redirect()->route('penyelenggaraan.index')
                        ->with('success','penyelenggaraan deleted successfully');

    }
}
