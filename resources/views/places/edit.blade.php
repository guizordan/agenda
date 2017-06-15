@extends('layouts.master')

@section('content')
  <div class="row ptb">
    <div class="col-sm-8">
      <h2>Editar Lugar</h2>
    </div>
    <div class="col-sm-4 text-right pt-10">
      <a href="{{ route('people.index') }}"> Voltar</a>
    </div>
  </div>

  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Ops!</strong> Ocorreram alguns problemas:<br>
      <ul class="list-unstyled">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {!! Form::model($place, ['method' => 'PATCH','route' => ['places.update', $place->id]]) !!}
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <strong>Rua:</strong>
          {!! Form::text('street', $place->street, array('placeholder' => 'Rua','class' => 'form-control')) !!}
        </div>

        <div class="form-group">
          <strong>Bairro:</strong>
          {!! Form::text('neighborhood', $place->neighborhood, array('placeholder' => 'Bairro','class' => 'form-control')) !!}
        </div>

        <div class="form-group">
          <strong>Número:</strong>
          {!! Form::text('number', $place->number, array('placeholder' => 'Número','class' => 'form-control', 'id' => 'phone')) !!}
        </div>

        <button type="submit" class="btn btn-success btn-block mt-20">Atualizar</button>
      </div>
    </div>
  {!! Form::close() !!}
@endsection
