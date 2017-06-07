@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Criar novo compromisso</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('appointments.index') }}"> Voltar</a>
            </div>
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

    {!! Form::open(array('route' => 'appointments.store','method'=>'POST')) !!}
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Descrição:</strong>
          {!! Form::text('description', null, array('placeholder' => 'Descrição','class' => 'form-control')) !!}
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Data:</strong>
          {!! Form::textarea('date', null, array('placeholder' => 'Data','class' => 'form-control','style'=>'height:100px')) !!}
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Criar</button>
      </div>
    </div>
    {!! Form::close() !!}

@endsection
