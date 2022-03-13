@extends('base')
@section('content')

<div class="card h-md-100 ecommerce-card-min-width">
    <div class="card-header">
        <div class="row flex-between-end">
          <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
            <h5 class="mb-0" data-anchor="data-anchor">Bil Majlis</h5>
          </div>
          <div class="col-auto ms-auto">
            <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/bilMajlis/create"><span class="fas fa-pencil-alt fs--2 me-1"></span>Create New</a></div>

          </div>
        </div>
      </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Tajuk</th>
          <th scope="col">Jenis Bil Majlis</th>
          <th scope="col">Tarikh</th>
          <th scope="col">Jumlah Bayaran</th>
          <th scope="col">Actions</th>


        </tr>
      </thead>
      <tbody>
          @foreach ($bilMajlis as $bilMajlis)
        <tr>
          <td>{{ $bilMajlis->tajuk }}</td>
          <td>{{ $bilMajlis->jenisBilMajlis }}</td>
          <td>{{ $bilMajlis->tarikh }}</td>
          <td>RM {{ $bilMajlis->totalBayaran }}</td>

          <td class="text-end">
            <div>
                <form action="{{ route('bilMajlis.destroy',$bilMajlis->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('bilMajlis.show',$bilMajlis->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('bilMajlis.edit',$bilMajlis->id) }}">Edit</a>

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


@endsection
