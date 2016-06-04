<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Reservation-@yield('title')</title>

    <script src="//code.jquery.com/jquery.min.js"></script><!-- for Q Index -->
    <!-- Bootstrap -->
    {!! Html::style('css/bootstrap.min.css') !!}
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <!-- Custom styles -->
    {{--{!! Html::style('css/custom/multi-upload/jquery.filer.css') !!}
    {!! Html::style('css/custom/multi-upload/themes/jquery.filer-dragdropbox-theme.css') !!}--}}
    <!--<link href="./css/jquery.filer.css" type="text/css" rel="stylesheet" />-->
    <!--<link href="./css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />-->
<!--    {!! Html::style('css/custom/style.css') !!} for Q Index -->
    <!--<link href="css/custom/style.css" rel="stylesheet">-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand Project</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"><a href="http://localhost:8000/">Home</a></li>
              <li><a href="/patient/create">Add Reservation</a></li>             
              <li><a href="patient/questions/create">Add Question</a></li>             
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav><!-- /.navbar -->

    <div class="container">
      <!--<div id="demo" class="collapse">-->
        <!--<h1>Main</h1>-->
      <!--</div>-->
        <div class="row">
            <div class="col-md-2">
                @section('sidebar')
                    Sidebar
                @show                
            </div>
            <div class="col-md-10">
                @if(Session::has('message'))
                <div class="alert alert-info">
                    {{Session::get('message')}}
                </div>
                @endif
                @if ($errors->any())
                    <ul>
                        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                    </ul>
                @endif

                @yield('content')
            </div>
        </div>
    </div><!-- /.container -->


    <!-- Bootstrap -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/app.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {!! Html::script('js/bootstrap.min.js') !!}
    {{--{!! Html::script('js/custom/multi-upload/jquery.filer.min.js') !!}--}}
<!--    {!! Html::script('js/custom/script.js') !!} for Q Index -->
    <!--<script src="js/bootstrap.min.js"></script>-->
  </body>

</html>
