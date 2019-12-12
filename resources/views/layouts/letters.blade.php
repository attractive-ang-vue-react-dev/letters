<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <!-- SEO Meta Data -->
    <meta name="keywords" content="inmate, prison, letters, reform, open source"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="author" content="Ameelio.org" />
    <meta name="copyright" content="Ameelio" />
    <meta name="robots" content="index,follow" />
    <meta name="_token" content="{{csrf_token()}}" />

    <!-- End SEO Meta Data -->

    <title>Ameelio Letters | Send letters to incarcerated loved ones for free</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/letters.css">
    <link rel="stylesheet" href="/css/compose.css">
    <link rel= "stylesheet" href="/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />

    <!-- CSS Files -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- add -->
    <script src="/js/popper.min.js"></script>
    <script src="/js/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- Chart JS -->
    <script src="/js/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="/js/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/js/now-ui-dashboard.js?v=1.0.1"></script>
  </head>
<body>

<div class="content">
    <div class="sidebar" data-color="blue">
        <div class="logo">
            <a class="sidebar-top-item sidebar-top-h" href="http://ameelio.org/"><img class="navbar-logo" src="/logo.png"></a>
            <b class="nav-sub sidebar-top-item"></b>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a  data-tab="profile" href="/profile">
                        <i class="fas fa-user-circle"></i>
                        Profile
                    </a>
                </li>
                <li>
                    <a  data-tab="letter" href="/letter">
                        <i class="fas fa-envelope"></i>
                        Letters
                    </a>
                </li>
                <li>
                    <a  data-tab="compose" href="/compose">
                        <i class="far fa-envelope"></i>
                        Compose
                    </a>
                </li>
                <li>

                <li>
                    <a  data-tab="contacts" href="/contacts">
                        <i class='fas fa-users'></i>
                        Contacts
                    </a>
                </li>
                <li>
                    <a data-tab="credits" href="/credits">
                    <i class='fas fa-money-bill'></i>
                        Credits
                    </a>
                </li>
                <li>
                    <a data-tab="tracker" href="/tracker">
                    <i class="material-icons" style="font-size:27px">location_on</i>
                        Tracker
                    </a>
                </li>
                <li class="log-out">
                    <a class="nav-link nav-link-logout" data-tab="logout" href="/logout">
                        <i class="fas fa-power-off"></i>
                        Log Out
                    </a>
                </li>
                <li>

                </li>
            </ul>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg  navbar-sticky fixed-top">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler btn  btn-info">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
            </div>
            <button class="btn btn-info navbar-toggler navbar-hidden" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <div class="profile-img"  >
                                <img src="/login.png"  alt="..">
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-panel">
         @yield('content')
    </div>

</div>
<footer class="footer">

</footer>

    <script>
      $(document).ready(function() {
        $("a[data-tab='{{ $tab }}']").addClass('active');
      });
    </script>

  </body>

</html>
