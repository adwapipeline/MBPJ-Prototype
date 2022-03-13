@extends('base')
@section('content')

<div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">Transaksi Pembayaran </h5>
        </div>
        <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/transaksi/{{ $transaksi->id }}/edit"><span class="fas fa-pencil-alt fs--2 me-1"></span>Update</a></div>
      </div>
    </div>
    <div class="card-body bg-light border-top">

      <div class="row">
        <div class="col-lg col-xxl-5">
          <h6 class="fw-semi-bold ls mb-3 text-uppercase">Transaksi</h6>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Jumlah Bayaran:</p>
            </div>
            <div class="col">RM {{ $transaksi->jumlahBayaran }}</div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Jenis Laporan:</p>
            </div>
            <div class="col">{{ $transaksi->jenisLaporan }}</div>
          </div>


          </div>
          <div class="row">

          </div>
        </div>

      </div>
    </div>
  </div>

@endsection
