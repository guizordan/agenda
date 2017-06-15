@extends('layouts.master')

@section('content')
  <div class="row ptb">
    <div class="col-sm-8">
      <h2>Cadastrar Pessoa</h2>
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

  {!! Form::open(array('route' => 'people.store','method'=>'POST')) !!}
  <div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <strong>Nome Completo:</strong>
        {!! Form::text('fullName', null, array('placeholder' => 'Nome Completo','class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        <strong>E-mail:</strong>
        {!! Form::text('email', null, array('placeholder' => 'E-mail','class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        <strong>Telefone:</strong>
        {!! Form::text('phone', null, array('placeholder' => 'Telefone','class' => 'form-control')) !!}
      </div>

      <button type="submit" class="btn btn-success btn-block mt-20">Criar</button>
    </div>
  </div>
  {!! Form::close() !!}
@endsection
