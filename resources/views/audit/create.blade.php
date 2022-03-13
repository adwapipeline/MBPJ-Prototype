@extends('base')
@section('content')



<div class="card mb-3">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
          <h5 class="mb-0" data-anchor="data-anchor">Audit Trail</h5>
        </div>
        <div class="col-auto ms-auto">

        </div>
      </div>
    </div>
    <div class="card-body bg-light">
      <div class="tab-content">
        <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-bb654daf-be1a-40fe-b687-3e45244388c2" id="dom-bb654daf-be1a-40fe-b687-3e45244388c2">
            <form action="{{ route('audit.store') }}" method="POST">
                @csrf
                <div class="mb-3">
              <label class="form-label" for="activity">Activity</label>
              <input class="form-control" name="activity" type="text" placeholder="Activity" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="date">Date</label>
                <input class="form-control" name="date" type="date" />
              </div>
            <div class="mb-3">
              <label class="form-label" for="user">User</label>
              <input class="form-control" name="user" type="user" placeholder="user" />
            </div>


            {{-- <div class="mb-3">
              <label class="form-label" for="basic-form-gender">Gender</label>
              <select class="form-select" id="basic-form-gender" aria-label="Default select example">
                <option selected="selected">Select your gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
            </div> --}}

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
