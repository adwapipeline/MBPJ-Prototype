<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorebilAgensiLuarRequest;
use App\Http\Requests\UpdatebilAgensiLuarRequest;
use App\Models\bilAgensiLuar;

class BilAgensiLuarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bilAgensiLuar = BilAgensiLuar::all();
        return view('bilAgensiLuar.index', compact('bilAgensiLuar'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bilAgensiLuar.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebilAgensiLuarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebilAgensiLuarRequest $request)
    {
        $bilAgensiLuar = bilAgensiLuar::create($request->all());
        return redirect()->route('bilAgensiLuar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bilAgensiLuar  $bilAgensiLuar
     * @return \Illuminate\Http\Response
     */
    public function show(bilAgensiLuar $bilAgensiLuar)
    {
        return view('bilAgensiLuar.show', compact('bilAgensiLuar'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bilAgensiLuar  $bilAgensiLuar
     * @return \Illuminate\Http\Response
     */
    public function edit(bilAgensiLuar $bilAgensiLuar)
    {
        return view('bilAgensiLuar.edit',compact('bilAgensiLuar'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebilAgensiLuarRequest  $request
     * @param  \App\Models\bilAgensiLuar  $bilAgensiLuar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebilAgensiLuarRequest $request, bilAgensiLuar $bilAgensiLuar)
    {
        $bilAgensiLuar->update($request->all());
        return redirect()->route('bilAgensiLuar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bilAgensiLuar  $bilAgensiLuar
     * @return \Illuminate\Http\Response
     */
    public function destroy(bilAgensiLuar $bilAgensiLuar)
    {
        $bilAgensiLuar->delete();

        return redirect()->route('bilAgensiLuar.index')
                        ->with('success','bilAgensiLuar deleted successfully');

    }
}
