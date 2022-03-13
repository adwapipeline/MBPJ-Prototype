@extends('base')
@section('content')

<div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">Kutipan Information</h5>
        </div>
        <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/kutipan/{{ $kutipan->id }}/edit"><span class="fas fa-pencil-alt fs--2 me-1"></span>Update</a></div>
      </div>
    </div>
    <div class="card-body bg-light border-top">

      <div class="row">
        <div class="col-lg col-xxl-5">
          <h6 class="fw-semi-bold ls mb-3 text-uppercase">Kutipan</h6>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Nama Pembayar:</p>
            </div>
            <div class="col">{{ $kutipan->namaPembayar }}</div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Kaedah Bayaran:</p>
            </div>
            <div class="col">{{ $kutipan->kaedahBayaran }}</div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Akaun No:</p>
            </div>
            <div class="col">
              <p class="fst-italic text-400 mb-1">{{ $kutipan->accountNo }}</p>
            </div>


          </div>
          <div class="row">

          </div>
        </div>

      </div>
    </div>
  </div>

@endsection
