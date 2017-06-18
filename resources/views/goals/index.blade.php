@extends('layouts.master')

@section('content')
<div class="row ptb">
  <div class="col-sm-8">
    <h2>Metas</h2>
  </div>
  <div class="col-sm-4 text-right">
    <a class="btn btn-success" href="{{ route('goals.create') }}">
      <i class="fa fa-plus"></i> Meta
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
      <th>Nome</th>
      <th>Atingida</th>
      <th>Ações</th>
    </tr>
  </thead>

  <tbody>
    @foreach($goals as $goal)
      <tr>
        <td>{{ $goal->name }}</td>
        <td class="text-center">
          @if($goal->accomplished == 1)
            <i class="fa fa-check text-success"></i>
          @else
            <i class="fa fa-times text-danger"></i>
          @endif
        </td>

        <td>
          <ul class="list-inline">
            <li>
              <a href="{{ route('goals.edit', ['id'=>$goal->id]) }}" class="btn btn-sm btn-primary">
                <i class="fa fa-edit"></i>
              </a>
            </li>
            <li>
              {!! Form::open(['method' => 'DELETE','route' => ['goals.destroy', $goal->id]]) !!}
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
