@extends('base')
@section('content')
<div class="card mb-3">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
          <h5 class="mb-0" data-anchor="data-anchor">Buat Pembayaran</h5>
        </div>
        <div class="col-auto ms-auto">

        </div>
      </div>
    </div>
    <div class="card-body bg-light">
      <div class="tab-content">
        <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-bb654daf-be1a-40fe-b687-3e45244388c2" id="dom-bb654daf-be1a-40fe-b687-3e45244388c2">
            <form action="{{ route('pembayaran.store') }}" method="POST">
                @csrf
                <div class="mb-3">
              <label class="form-label" for="namaPembayar">Nama Pembayar</label>
              <input class="form-control" name="namaPembayar" type="text" placeholder="namaPembayar" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="tarikhPembayaran">Tarikh</label>
                <input class="form-control" name="tarikhPembayaran" type="date" />
              </div>

            <div class="mb-3">
                <label class="form-label" for="kaedahPembayaran">Kaedah Pembayaran</label>
                <select class="form-select" name="kaedahPembayaran" type="text">
                  <option selected="selected">Pilih Bayaran</option>
                  <option value="Tunai">Tunai</option>
                  <option value="Cek">Cek</option>
                  <option value="Kad Kredit">Kad Kredit</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="totalPembayaran">Jumlah Pembayaran (RM)</label>
                <input class="form-control" name="totalPembayaran" type="totalPembayaran" placeholder="totalPembayaran" />
              </div>



            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
