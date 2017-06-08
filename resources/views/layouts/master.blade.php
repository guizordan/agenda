<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Agenda</title>

      <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            @yield('content')
          </div>
        </div>
      </div>
    </body>
</html>
