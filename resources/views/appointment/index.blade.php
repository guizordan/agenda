@extends('layouts.master')

@section('content')

  <div class="row ptb">
    <div class="col-sm-8">
      <h2>Agenda</h2>
    </div>
    <div class="col-sm-4 text-right">
      <a class="btn btn-success" href="{{ route('appointment.create') }}">
        Novo compromisso
      </a>
    </div>
  </div>

  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

  <table class="table table-bordered">
    <tr>
      <th>Descrição</th>
      <th>Data</th>
      <th>Ações</th>
    </tr>
    @foreach ($appointments as $key => $appointment)
    <tr>
      <td>{{ $appointment->description }}</td>
      <td>{{ $appointment->date }}</td>
      <td>
        <a class="btn btn-primary" href="{{ route('appointment.edit',$appointment->id) }}">Alterar</a>
        {!! Form::open(['method' => 'DELETE','route' => ['appointment.destroy', $appointment->id],'style'=>'display:inline']) !!}
        {!! Form::submit('Remover', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </table>

@endsection
