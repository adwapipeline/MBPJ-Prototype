<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorebilMajlisRequest;
use App\Http\Requests\UpdatebilMajlisRequest;
use App\Models\bilMajlis;

class BilMajlisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bilMajlis = BilMajlis::all();
        return view('bilMajlis.index', compact('bilMajlis'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bilMajlis.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebilMajlisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebilMajlisRequest $request)
    {
        $bilMajlis = bilMajlis::create($request->all());
        return redirect()->route('bilMajlis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bilMajlis  $bilMajlis
     * @return \Illuminate\Http\Response
     */
    public function show(bilMajlis $bilMajlis)
    {
        return view('bilMajlis.show', compact('bilMajlis'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bilMajlis  $bilMajlis
     * @return \Illuminate\Http\Response
     */
    public function edit(bilMajlis $bilMajlis)
    {
        return view('bilMajlis.edit',compact('bilMajlis'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebilMajlisRequest  $request
     * @param  \App\Models\bilMajlis  $bilMajlis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebilMajlisRequest $request, bilMajlis $bilMajlis)
    {
        $bilMajlis->update($request->all());
        return redirect()->route('bilMajlis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bilMajlis  $bilMajlis
     * @return \Illuminate\Http\Response
     */
    public function destroy(bilMajlis $bilMajlis)
    {
        $bilMajlis->delete();

        return redirect()->route('bilMajlis.index')
                        ->with('success','Bil Majlis deleted successfully');

    }
}
