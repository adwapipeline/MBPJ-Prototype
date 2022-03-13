@extends('base')
@section('content')

{{-- <div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">Penyelenggaraan Information</h5>
        </div>
        <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/penyelenggaraan/{{ $penyelenggaraan->id }}/edit"><span class="fas fa-pencil-alt fs--2 me-1"></span>Update</a></div>
      </div>
    </div>
    <div class="card-body bg-light border-top">

      <div class="row">
        <div class="col-lg col-xxl-5">
          <h6 class="fw-semi-bold ls mb-3 text-uppercase">Penyelenggaraan</h6>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Jumlah Bayaran:</p>
            </div>
            <div class="col">RM {{ $penyelenggaraan->jumlahBayaran }}</div>
          </div>
          <div class="row">
            <div class="col-5 col-sm-4">
              <p class="fw-semi-bold mb-1">Baki Bayaran:</p>
            </div>
            <div class="col">RM {{ $penyelenggaraan->bakiBayaran }}</div>
          </div>


          </div>
          <div class="row">

          </div>
        </div>

      </div>
    </div>
  </div> --}}

  <div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">Penyelenggaraan Information</h5>
        </div>
        <div class="col-auto"><button onClick="window.print()" class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" type="button"><span class="fas fa-print me-1"> </span>Print Resit</button>
        </div>
      </div>
    </div>


  <div class="card mb-3">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="text-500">Invoice to</h6>
          <h5>{{ auth()->user()->name }}</h5>
          </div>
        <div class="col-sm-auto ms-auto">
          <div class="table-responsive">
            <table class="table table-sm table-borderless fs--1">
              <tbody>
                <tr>
                  <th class="text-sm-end">Invoice No:</th>
                  <td>0{{ $penyelenggaraan->id }}</td>
                </tr>
                <tr>
                  <th class="text-sm-end">Order Number:</th>
                  <td>#MBPJ00{{ $penyelenggaraan->id }}</td>
                </tr>
                <tr>
                  <th class="text-sm-end">Invoice Date:</th>
                  <td>{{ date('Y-m-d') }}</td>
                </tr>
                <tr>
                  <th class="text-sm-end">Baki Bayaran:</th>
                  <td>RM {{ $penyelenggaraan->bakiBayaran }}</td>
                </tr>
                <tr class="alert-success fw-bold">
                  <th class="text-sm-end">Jumlah Bayaran:</th>
                  <td>RM {{ $penyelenggaraan->jumlahBayaran }}</td>
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
              <td class="align-middle text-center">2</td>
              <td class="align-middle text-end">$65.00</td>
              <td class="align-middle text-end">$130.00</td>
            </tr>
            <tr>
              <td class="align-middle">
                <h6 class="mb-0 text-nowrap">2 Page website design</h6>
                <p class="mb-0">Includes basic wireframes and responsive templates</p>
              </td>
              <td class="align-middle text-center">1</td>
              <td class="align-middle text-end">$2,100.00</td>
              <td class="align-middle text-end">$2,100.00</td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="row justify-content-end">
        <div class="col-auto">
          <table class="table table-sm table-borderless fs--1 text-end">

            <tr class="border-top">
              <th class="text-900">Jumlah Bayaran:</th>
              <td class="fw-semi-bold">RM {{ $penyelenggaraan->jumlahBayaran }}</td>
            </tr>
            <tr class="border-top border-top-2 fw-bolder text-900">
              <th>Jumalah Semua:</th>
              <td>RM {{ $penyelenggaraan->jumlahBayaran }}</td>
            </tr>
          </table>
        </div>
      </div>

    </div>
    <div class="card-footer bg-light">
      <p class="fs--1 mb-0"><strong>Notes: </strong>We really appreciate your business and if there’s anything else we can do, please let us know!</p>
    </div>
  </div>
@endsection
