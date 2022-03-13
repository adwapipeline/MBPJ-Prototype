<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorekutipanRequest;
use App\Http\Requests\UpdatekutipanRequest;
use App\Models\kutipan;

class KutipanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kutipan = kutipan::all();
        return view('kutipan.index', compact('kutipan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kutipan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorekutipanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorekutipanRequest $request)
    {
        $kutipan = kutipan::create($request->all());
        return redirect()->route('kutipan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kutipan  $kutipan
     * @return \Illuminate\Http\Response
     */
    public function show(kutipan $kutipan)
    {
        return view('kutipan.show', compact('kutipan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kutipan  $kutipan
     * @return \Illuminate\Http\Response
     */
    public function edit(kutipan $kutipan)
    {
        return view('kutipan.edit',compact('kutipan'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekutipanRequest  $request
     * @param  \App\Models\kutipan  $kutipan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekutipanRequest $request, kutipan $kutipan)
    {

        $kutipan->update($request->all());
        return redirect()->route('kutipan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kutipan  $kutipan
     * @return \Illuminate\Http\Response
     */
    public function destroy(kutipan $kutipan)
    {
        $kutipan->delete();

        return redirect()->route('kutipan.index')
                        ->with('success','Kutipan deleted successfully');
    }
}
