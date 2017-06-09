<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Agenda</title>

      <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

      <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>

      <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('appointment.index') }}">Minha agenda</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="@if (Route::currentRouteName() === 'appointment.index') active @endif"><a href="#">Agenda</a></li>
            <li class="@if (Route::currentRouteName() === 'people.index') active @endif"><a href="#about">Pessoas</a></li>
            <li><a href="#about">Locais</a></li>
          </ul>
        </div>
      </div>
    </nav>

      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            @yield('content')
          </div>
        </div>
      </div>
    </body>
</html>
