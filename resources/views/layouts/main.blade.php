<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1,width=device-width, height=device-height, target-densitydpi=device-dpi" />
    <title>Ameelio - Letters | Send mail to any inmate in the US</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <link rel="dns-prefetch" href="//fonts.googleapis.com" > -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" id="et-builder-googlefonts-cached-css" href="http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic&ver=5.3#038;subset=latin,latin-ext">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla:100,200,400,700">

    <link rel= "stylesheet" href="/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/register.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  </head>
  <body class="bg-blue">
    <div class="container">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
