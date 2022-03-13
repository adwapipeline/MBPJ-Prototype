@extends('base')
@section('content')

<div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">Laporan</h5>
        </div>
        <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/laporan/{{ $laporan->id }}/edit"><span class="fas fa-pencil-alt fs--2 me-1"></span>Update</a></div>
      </div>
    </div>
    <div class="card-body bg-light border-top">

      <div class="row">
        <div class="col-lg col-xxl-5">
          <h6 class="fw-semi-bold ls mb-3 text-uppercase">Laporan Information</h6>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Tajuk:</p>
            </div>
            <div class="col">{{ $laporan->tajukLaporan }}</div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Detail Laporan:</p>
            </div>
            <div class="col">{{ $laporan->detailLaporan }}</div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Jenis Laporan:</p>
            </div>
            <div class="col">{{ $laporan->jenisLaporan }}</div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Tarikh:</p>
            </div>
            <div class="col">
              <p class="fst-italic text-400 mb-1">{{ $laporan->tarikh }}</p>
            </div>


          </div>
          <div class="row">

          </div>
        </div>

      </div>
    </div>
  </div>

@endsection
