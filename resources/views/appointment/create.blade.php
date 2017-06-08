@extends('layouts.master')

@section('content')
  <div class="row ptb">
    <div class="col-sm-8">
      <h2>Criar compromisso</h2>
    </div>
    <div class="col-sm-4 text-right">
      <a class="btn btn-primary" href="{{ route('appointment.index') }}"> Voltar</a>
    </div>
  </div>

  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Ops!</strong> Ocorreram alguns problemas.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {!! Form::open(array('route' => 'appointment.store','method'=>'POST')) !!}
  <div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <strong>Descrição:</strong>
        {!! Form::text('description', null, array('placeholder' => 'Descrição','class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        <strong>Data:</strong>
        {!! Form::date('date', null, array('placeholder' => 'Data','class' => 'form-control')) !!}
      </div>
      <button type="submit" class="btn btn-success btn-block pull-right">Criar</button>
    </div>
  </div>
  {!! Form::close() !!}
@endsection
