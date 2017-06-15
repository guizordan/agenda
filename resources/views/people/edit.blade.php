@extends('layouts.master')

@section('content')
  <div class="row ptb">
    <div class="col-sm-8">
      <h2>Editar Pessoa</h2>
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

  {!! Form::model($person, ['method' => 'PATCH','route' => ['people.update', $person->id]]) !!}
  <div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <strong>Nome Completo:</strong>
        {!! Form::text('fullName', $person->fullName, array('placeholder' => 'Nome Completo','class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        <strong>E-mail:</strong>
        {!! Form::email('email', $person->email, array('placeholder' => 'E-mail','class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        <strong>Telefone:</strong>
        {!! Form::text('phone', $person->phone, array('placeholder' => 'Telefone','class' => 'form-control', 'id' => 'phone')) !!}
      </div>

      <button type="submit" class="btn btn-success btn-block mt-20">Atualizar</button>
    </div>
  </div>
  <script>
    $('#phone').mask('(00) 0 0000-0000');
  </script>
  {!! Form::close() !!}
@endsection
