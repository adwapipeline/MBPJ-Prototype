@extends('base')
@section('content')

<div class="card mb-3">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
          <h5 class="mb-0" data-anchor="data-anchor">Edit Bil Majlis</h5>
        </div>
        <div class="col-auto ms-auto">

        </div>
      </div>
    </div>
    <div class="card-body bg-light">
      <div class="tab-content">
        <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-bb654daf-be1a-40fe-b687-3e45244388c2" id="dom-bb654daf-be1a-40fe-b687-3e45244388c2">
            <form action="/bilMajlis/{{ $bilMajlis->id }}" method="POST">
                @csrf
                @method('PUT')


                <div class="mb-3">
                    <label class="form-label" for="tajuk">Tajuk</label>
                    <input class="form-control" name="tajuk" type="text" placeholder="tajuk" value="{{ $bilMajlis->tajuk }}"/>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="jenisBilMajlis">Jenis Bil Majlis</label>
                    <select class="form-select" name="jenisBilMajlis" type="jenisBilMajlis">
                      <option selected="selected">{{ $bilMajlis->jenisBilMajlis }}</option>
                      <option value="Lesen">Lesen</option>
                      <option value="Kompaun">Kompaun</option>
                      <option value="Sewaan">Sewaan</option>
                      <option value="Tempahan">Tempahan</option>

                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="tarikh">Tarikh </label>
                    <input class="form-control" name="tarikh" type="tarikh" placeholder="tarikh" value="{{ $bilMajlis->tarikh }}"/>
                  </div>

                  <div class="mb-3">
                      <label class="form-label" for="totalBayaran">Jumlah Bayaran </label>
                      <input class="form-control" name="totalBayaran" type="totalBayaran" placeholder="totalBayaran" value="{{ $bilMajlis->totalBayaran }}"/>
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
