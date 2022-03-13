@extends('base')
@section('content')

<div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">Terima kasih kerana membuat pembayaran kepada MBPJ!</h5>
        </div>
        @if (auth()-> user()->role =="Admin" || auth()-> user()->role =="Penyelia" )

        <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/pembayaran/{{ $pembayaran->id }}/edit"><span class="fas fa-pencil-alt fs--2 me-1"></span>Update</a></div>

        @endif

    </div>
    </div>
    <div class="card-body bg-light border-top">

      <div class="row">
        <div class="col-lg col-xxl-5">
          <h6 class="fw-semi-bold ls mb-3 text-uppercase">Pembayaran</h6>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Nama Pembayar:</p>
            </div>
            <div class="col">{{ $pembayaran->namaPembayar }}</div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Tarikh:</p>
            </div>
            <div class="col">{{ $pembayaran->tarikhPembayaran }}</div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Kaedah Bayaran:</p>
            </div>
            <div class="col">{{ $pembayaran->kaedahPembayaran }}</div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Jumlah Pembayaran:</p>
            </div>
            <div class="col">
                <div class="col">RM {{ $pembayaran->totalPembayaran }}</div>
            </div>


          </div>
          <div class="row">

          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="text-500">Invoice to</h6>
          <h5>{{ $pembayaran->namaPembayar }}</h5>
          </div>
        <div class="col-sm-auto ms-auto">
          <div class="table-responsive">
            <table class="table table-sm table-borderless fs--1">
              <tbody>
                <tr>
                  <th class="text-sm-end">Invoice No:</th>
                  <td>0{{ $pembayaran->id }}</td>
                </tr>
                <tr>
                  <th class="text-sm-end">Order Number:</th>
                  <td>#MBPJ00{{ $pembayaran->id }}</td>
                </tr>
                <tr>
                  <th class="text-sm-end">Invoice Date:</th>
                  <td>{{ date('Y-m-d') }}</td>
                </tr>
                <tr>
                  <th class="text-sm-end">Baki Bayaran:</th>
                  <td>RM {{ $pembayaran->bakiBayaran }}</td>
                </tr>
                <tr class="alert-success fw-bold">
                  <th class="text-sm-end">Jumlah Bayaran:</th>
                  <td>RM {{ $pembayaran->totalPembayaran }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="table-responsive scrollbar mt-4 fs--1">
        <table class="table table-striped border-bottom">
          <thead class="light">
            <tr class="bg-primary text-white dark__bg-1000">
              <th class="border-0">Products</th>
              <th class="border-0 text-center">Quantity</th>
              <th class="border-0 text-end">Rate</th>
              <th class="border-0 text-end">Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="align-middle">
                <h6 class="mb-0 text-nowrap">Platinum web hosting package</h6>
                <p class="mb-0">Down 35mb, Up 100mb</p>
              </td>
              <td class="align-middle text-center">1</td>
              <td class="align-middle text-end">RM {{ $pembayaran->totalPembayaran }}</td>
              <td class="align-middle text-end">RM {{ $pembayaran->totalPembayaran }}</td>
            </tr>


          </tbody>
        </table>
      </div>
      <div class="row justify-content-end">
        <div class="col-auto">
          <table class="table table-sm table-borderless fs--1 text-end">

            <tr class="border-top">
              <th class="text-900">Jumlah Bayaran:</th>
              <td class="fw-semi-bold">RM {{ $pembayaran->totalPembayaran }}</td>
            </tr>
            <tr class="border-top border-top-2 fw-bolder text-900">
              <th>Jumlah Semua:</th>
              <td>RM {{ $pembayaran->totalPembayaran }}</td>
            </tr>
          </table>
        </div>
      </div>

    </div>
    <div class="card-footer bg-light">
      <p class="fs--1 mb-0"><strong>Notes: </strong>We really appreciate your business and if there’s anything else we can do, please let us know!</p>
    </div>
  </div>


  <div class="card mb-3">
    <div class="card-body">
      <div class="row justify-content-between align-items-center">
        <div class="col-md">
          <h5 class="mb-2 mb-md-0">Resit ID #MBPJ00{{ $pembayaran->id }} </h5>
        </div>
        <div class="col-auto">
          <button class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" type="button"><span class="fas fa-arrow-down me-1"> </span>Download (.pdf)</button>
          <button onClick="window.print()" class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" type="button"><span class="fas fa-print me-1"> </span>Print Resit</button>
        </div>
      </div>
    </div>
  </div>

@endsection
