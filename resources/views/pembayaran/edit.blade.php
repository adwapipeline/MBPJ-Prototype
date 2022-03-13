@extends('base')
@section('content')

<div class="card mb-3">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
          <h5 class="mb-0" data-anchor="data-anchor">Edit Pembayaran</h5>
        </div>
        <div class="col-auto ms-auto">

        </div>
      </div>
    </div>
    <div class="card-body bg-light">
      <div class="tab-content">
        <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-bb654daf-be1a-40fe-b687-3e45244388c2" id="dom-bb654daf-be1a-40fe-b687-3e45244388c2">
            <form action="/pembayaran/{{ $pembayaran->id }}" method="POST">
                @csrf
                @method('PUT')


                <div class="mb-3">
                      <label class="form-label" for="namaPembayar">Nama Pembayar</label>
                      <input class="form-control" name="namaPembayar" type="namaPembayar" value="{{ $pembayaran->namaPembayar }}" />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="tarikhPembayaran">Tarikh</label>
                    <input class="form-control" name="tarikhPembayaran" type="tarikhPembayaran" placeholder="tarikhPembayaran" value="{{ $pembayaran->tarikhPembayaran }}"/>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="kaedahPembayaran">Kaedah Bayaran</label>
                    <select class="form-select" name="kaedahPembayaran" type="kaedahPembayaran">
                      <option selected="selected">{{ $pembayaran->kaedahPembayaran }}</option>
                      <option value="Tunai">Tunai</option>
                      <option value="Cek">Cek</option>
                      <option value="Kad Kredit">Kad Kredit</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="totalpembayaran">Jumlah pembayaran (RM)</label>
                    <input class="form-control" name="totalpembayaran" type="totalpembayaran" placeholder="totalpembayaran" value="{{ $pembayaran->totalPembayaran }}"/>
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
