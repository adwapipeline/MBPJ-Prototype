@extends('base')
<style>
    #outer
{
    width:100%;
    text-align: center;
}
.inner
{
    display: inline-block;
}
</style>
@section('content')
{{--
@if (auth()-> user()->role =="Admin" || auth()-> user()->role =="Penyelia" )
<div class="card h-md-100 ecommerce-card-min-width">
    <div class="card-header">
        <div class="row flex-between-end">
          <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
            <h5 class="mb-0" data-anchor="data-anchor">Pembayaran</h5>
          </div>
          <div class="col-auto ms-auto">
            <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/pembayaran/create"><span class="fas fa-pencil-alt fs--2 me-1"></span>Create New</a></div>

          </div>
        </div>
      </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nama Pembayar</th>
          <th scope="col">Tarikh</th>
          <th scope="col">Kaedah Pembayaran</th>
          <th scope="col">Jumlah Pembayaran (RM)</th>
          <th scope="col">Actions</th>


        </tr>
      </thead>
      <tbody>
          @foreach ($pembayaran as $pembayaran)
        <tr>
          <td>{{ $pembayaran->namaPembayar }}</td>
          <td>{{ $pembayaran->tarikhPembayaran }}</td>
          <td>{{ $pembayaran->kaedahPembayaran }}</td>
          <td>RM {{ $pembayaran->totalPembayaran }}</td>

          <td class="">
            <div>
                <div id="outer">
                    <div class="inner">
                    <a class="btn btn-info" href="{{ route('pembayaran.show',$pembayaran->id) }}">Show</a>
                    </div>
                    <div class="inner">
                    <a class="btn btn-primary" href="{{ route('pembayaran.edit',$pembayaran->id) }}">Edit</a>
                    </div>
                    <div class="inner">
                        <form action="{{ route('pembayaran.destroy',$pembayaran->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>

            </div>
          </td>
        </tr>

        @endforeach


      </tbody>
    </table>
  </div>

  @endif --}}


  <div class="card h-md-100 ecommerce-card-min-width">
    <div class="card-header">
    <div class="row flex-between-end">
      <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
        <h5 class="mb-0" data-anchor="data-anchor">Pembayaran</h5>
      </div>
      <div class="col-auto ms-auto">
        <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/pembayaran/create"><span class="fas fa-pencil-alt fs--2 me-1"></span>Create New</a></div>

      </div>
    </div>
  </div>
  <div id="tableExample2" data-list='{"valueNames":["nama","tarikh","kaedah pembayaran","jumlah pembayaran","actions"],"page":10,"pagination":true}'>
    <div class="table-responsive scrollbar">
      <table class="table table-bordered table-striped fs--1 mb-0">
        <thead class="bg-200 text-900">
          <tr>
            <th class="sort" data-sort="nama">Pembayar</th>
            <th class="sort" data-sort="tarikh">Tarikh</th>
            <th class="sort" data-sort="kaedah pembayaran">Kaedah Pembayaran</th>
            <th class="sort" data-sort="jumlah pembayaran">Jumlah Pembayaran</th>
            <th class="sort" data-sort="actions">Actions</th>

          </tr>
        </thead>
        <tbody class="list">
            @foreach ( $pembayaran as $pembayaran )
          <tr>
            <td>{{ $pembayaran->namaPembayar }}</td>
            <td>{{ $pembayaran->tarikhPembayaran }}</td>
            <td>{{ $pembayaran->kaedahPembayaran }}</td>
            <td>RM {{ $pembayaran->totalPembayaran }}</td>

            <td class="">

                    <div class="inner">
                        <a class="btn btn-info" href="{{ route('pembayaran.show',$pembayaran->id) }}">Show</a>
                    </div>

                    <div class="inner">
                        <a class="btn btn-primary" href="{{ route('pembayaran.edit',$pembayaran->id) }}">Edit</a>
                    </div>

                    <div class="inner">
                            <form action="{{ route('pembayaran.destroy',$pembayaran->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                    </div>

            </td>

          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
    <div class="d-flex justify-content-center mt-3">
      <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
      <ul class="pagination mb-0"></ul>
      <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
    </div>
  </div>



@endsection
