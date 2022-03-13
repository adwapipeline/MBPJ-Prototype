<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorelaporanRequest;
use App\Http\Requests\UpdatelaporanRequest;
use App\Models\laporan;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = Laporan::all();
        return view('laporan.index', compact('laporan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelaporanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelaporanRequest $request)
    {
        $laporan = laporan::create($request->all());
        return redirect()->route('laporan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(laporan $laporan)
    {
        return view('laporan.show', compact('laporan'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(laporan $laporan)
    {
        return view('laporan.edit',compact('laporan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelaporanRequest  $request
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelaporanRequest $request, laporan $laporan)
    {
        $laporan->update($request->all());
        return redirect()->route('laporan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(laporan $laporan)
    {
        $laporan->delete();

        return redirect()->route('laporan.index')
        ->with('success','laporan deleted successfully');

    }
}
