@extends('base')
@section('content')

<div class="card h-md-100 ecommerce-card-min-width">
    <div class="card-header">
        <div class="row flex-between-end">
          <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
            <h5 class="mb-0" data-anchor="data-anchor">Bil Agensi Luar</h5>
          </div>
          <div class="col-auto ms-auto">
            <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="/bilAgensiLuar/create">Create New</a></div>

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
          @foreach ($bilAgensiLuar as $bilAgensiLuar)
        <tr>
          <td>{{ $bilAgensiLuar->tajuk }}</td>
          <td>{{ $bilAgensiLuar->jenisBilMajlis }}</td>
          <td>{{ $bilAgensiLuar->tarikh }}</td>
          <td>RM {{ $bilAgensiLuar->totalBayaran }}</td>

          <td class="text-end">
            <div>
                <form action="{{ route('bilAgensiLuar.destroy',$bilAgensiLuar->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('bilAgensiLuar.show',$bilAgensiLuar->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('bilAgensiLuar.edit',$bilAgensiLuar->id) }}">Edit</a>

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
