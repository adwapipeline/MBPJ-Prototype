<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreauditTrailRequest;
use App\Http\Requests\UpdateauditTrailRequest;
use App\Models\auditTrail;

class AuditTrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audit_trail = auditTrail::all();
        return view ('audit.index',compact('audit_trail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('audit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreauditTrailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreauditTrailRequest $request)
    {
        $audit_trail = auditTrail::create($request->all());

        return redirect()->route('audit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\auditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function show(auditTrail $auditTrail)
    {
        return view('audit.show',compact('auditTrail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\auditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function edit($auditTrail)
    {
        $auditTrail = auditTrail::where('id', $auditTrail)->first();
        return view('audit.edit',compact('auditTrail'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateauditTrailRequest  $request
     * @param  \App\Models\auditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateauditTrailRequest $request, $auditTrail)
    {
         // $audit_trail = audit_trail::find($id);
         $auditTrail = auditTrail::where('id', $auditTrail)->first();

         $auditTrail->update($request->all());

         return redirect()->route('audit.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\auditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function destroy(auditTrail $auditTrail)
    {
        $auditTrail->delete();

        return redirect()->route('audit.index')
                        ->with('success','Audit deleted successfully');
    }
}
