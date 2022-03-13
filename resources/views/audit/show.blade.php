@extends('base')
@section('content')

<div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">Audit Trail Information</h5>
        </div>
        <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/audit/{{ $auditTrail->id }}/edit">Edit</a></div>
    </div>
    </div>
    <div class="card-body bg-light border-top">

      <div class="row">
        <div class="col-lg col-xxl-5">
          <h6 class="fw-semi-bold ls mb-3 text-uppercase">Audit Information</h6>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Activity:</p>
            </div>
            <div class="col">{{ $auditTrail->activity }}</div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Created:</p>
            </div>
            <div class="col">{{ $auditTrail->date }}</div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">User:</p>
            </div>
            <div class="col">
              <p class="fst-italic text-400 mb-1">{{ $auditTrail->user }}</p>
            </div>

          </div>
          <div class="row">

          </div>
        </div>

      </div>
    </div>
  </div>

@endsection
