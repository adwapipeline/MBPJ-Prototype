@extends('base')
@section('content')

<div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">Bil Agensi Luar</h5>
        </div>
        <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/bilAgensiLuar/{{ $bilAgensiLuar->id }}/edit"><span class="fas fa-pencil-alt fs--2 me-1"></span>Edit</a></div>
      </div>
    </div>
    <div class="card-body bg-light border-top">

      <div class="row">
        <div class="col-lg col-xxl-5">
          <h6 class="fw-semi-bold ls mb-3 text-uppercase">Bil Agensi Luar</h6>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Tajuk:</p>
            </div>
            <div class="col">{{ $bilAgensiLuar->tajuk }}</div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Jenis Bil Majlis:</p>
            </div>
            <div class="col">{{ $bilAgensiLuar->jenisBilMajlis }}</div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Tarikh:</p>
            </div>
            <div class="col">{{ $bilAgensiLuar->tarikh }}</div>
        </div>
            <div class="row">
                <div class="col-5 col-sm-4">
                  <p class="fw-semi-bold mb-1">Jumlah Bayaran:</p>
                </div>
                <div class="col">{{ $bilAgensiLuar->totalBayaran }}</div>
              </div>


          </div>
          <div class="row">

          </div>
        </div>

      </div>
    </div>
  </div>

@endsection
