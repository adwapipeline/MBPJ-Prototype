@extends('base')
@section('content')

<div class="card mb-3">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto flex-lg-grow-1 flex-lg-basis-0 align-self-center">
          <h5 class="mb-0" data-anchor="data-anchor">Edit User</h5>
        </div>
        <div class="col-auto ms-auto">

        </div>
      </div>
    </div>
    <div class="card-body bg-light">
      <div class="tab-content">
        <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-bb654daf-be1a-40fe-b687-3e45244388c2" id="dom-bb654daf-be1a-40fe-b687-3e45244388c2">
            <form action="/user/{{ $user->id }}" method="POST">
                @csrf
                @method('PUT')


                <div class="mb-3">
              <label class="form-label" for="name">Name</label>
              <input class="form-control" name="name" type="text" placeholder="name" value="{{ $user->name }}" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="role">Role</label>
                <select class="form-select" name="role" value="{{ $user->role }}">
                  <option selected="selected">Select</option>
                  <option value="Pelanggan">Pelanggan</option>
                  <option value="Penyelia">Penyelia</option>
                  <option value="Admin">Admin</option>

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
