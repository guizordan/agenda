@extends('layouts.master')

@section('content')
<div class="row ptb">
  <div class="col-sm-8">
    <h2>Locais</h2>
  </div>
  <div class="col-sm-4 text-right">
    <a class="btn btn-success" href="{{ route('places.create') }}">
      <i class="fa fa-plus"></i> Local
    </a>
  </div>
</div>

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif

<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>Rua</th>
      <th>Bairro</th>
      <th>Número</th>
      <th>Ação</th>
    </tr>
  </thead>

  <tbody>
    @foreach($places as $place)
      <tr>
        <td>{{ $place->street }}</td>
        <td>{{ $place->neighborhood }}</td>
        <td>{{ $place->number }}</td>

        <td>
          <ul class="list-inline">
            <li>
              <a href="{{ route('places.edit', ['id'=>$place->id]) }}" class="btn btn-sm btn-primary">
                <i class="fa fa-edit"></i>
              </a>
            </li>
            <li>
              {!! Form::open(['method' => 'DELETE','route' => ['places.destroy', $place->id]]) !!}
              <button class="btn btn-sm btn-danger" type="submit">
                <i class="fa fa-trash"></i>
              </button>
              {!! Form::close() !!}
            </li>
          </ul>
        </td>

      </tr>
    @endforeach
  </tbody>
</table>
@endsection
