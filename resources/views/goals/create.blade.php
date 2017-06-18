@extends('layouts.master')

@section('content')
  <div class="row ptb">
    <div class="col-sm-8">
      <h2>Criar meta</h2>
    </div>
    <div class="col-sm-4 text-right pt-10">
      <a href="{{ route('goals.index') }}"> Voltar</a>
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

  {!! Form::open(array('route' => 'goals.store','method'=>'POST')) !!}
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <strong>Nome:</strong>
          {!! Form::text('name', null, array('placeholder' => 'Nome','class' => 'form-control')) !!}
        </div>

        <button type="submit" class="btn btn-success btn-block mt-20">Criar</button>
      </div>
    </div>
  {!! Form::close() !!}
@endsection
