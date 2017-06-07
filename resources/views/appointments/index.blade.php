@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Compromissos</h2>
      </div>
      <div class="pull-right">
        <a class="btn btn-success" href="{{ route('appointments.create') }}">Criar novo Compromisso</a>
      </div>
    </div>
  </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Descrição</th>
            <th>Data</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($appointments as $key => $appointment)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $appointment->title }}</td>
        <td>{{ $appointment->description }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('appointments.show',$appointment->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('appointments.edit',$appointment->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['appointments.destroy', $appointment->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

@endsection
