@extends('base')
@section('content')

<div class="card mb-3">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
          <h5 class="mb-0" data-anchor="data-anchor">Edit Kutipan</h5>
        </div>
        <div class="col-auto ms-auto">

        </div>
      </div>
    </div>
    <div class="card-body bg-light">
      <div class="tab-content">
        <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-bb654daf-be1a-40fe-b687-3e45244388c2" id="dom-bb654daf-be1a-40fe-b687-3e45244388c2">
            <form action="/kutipan/{{ $kutipan->id }}" method="POST">
                @csrf
                @method('PUT')


                <div class="mb-3">
                    <label class="form-label" for="pembayaran_id">ID Pembayaran</label>
                    <input class="form-control" name="pembayaran_id" type="text" placeholder="pembayaran_id" value="{{ $kutipan->pembayaran_id }}"/>
                  </div>
                  <div class="mb-3">
                      <label class="form-label" for="namaPembayar">Nama Pembayar</label>
                      <input class="form-control" name="namaPembayar" type="namaPembayar" value="{{ $kutipan->namaPembayar }}" />
                    </div>
                  <div class="mb-3">
                    <label class="form-label" for="accountNo">Akaun No </label>
                    <input class="form-control" name="accountNo" type="accountNo" placeholder="accountNo" value="{{ $kutipan->accountNo }}"/>
                  </div>

                  <div class="mb-3">
                      <label class="form-label" for="totalKutipan">Jumlah Kutipan </label>
                      <input class="form-control" name="totalKutipan" type="totalKutipan" placeholder="totalKutipan" value="{{ $kutipan->totalKutipan }}"/>
                    </div>


                  <div class="mb-3">
                    <label class="form-label" for="kaedahBayaran">Kaedah Bayaran</label>
                    <select class="form-select" name="kaedahBayaran" type="kaedahBayaran">
                      <option selected="selected">{{ $kutipan->kaedahBayaran }}</option>
                      <option value="Tunai">Tunai</option>
                      <option value="Cek">Cek</option>
                      <option value="Kad Kredit">Kad Kredit</option>
                    </select>
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
