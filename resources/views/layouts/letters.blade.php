<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ameelio Letters | Send letters to incarcerated loved ones for free</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/letters.css">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/dashboard/dashboard.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">


    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
          <div class="sidebar-top">
            {{-- <a class="sidebar-top-item" href="http://ameelio.org/"><img class="navbar-logo" src="/logo.png"></a> --}}
            <a class="sidebar-top-item sidebar-top-h" href="http://ameelio.org/">Ameelio</a>
            <b class="nav-sub sidebar-top-item">Letters</b>
          </div>

          <div class="sidebar-sticky">

            {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6> --}}
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" data-tab="compose" href="/compose">
                  <i class="far fa-envelope"></i>
                  Compose
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-tab="contacts" href="/contacts">
                  <i class="fas fa-user-friends"></i>
                  Contacts
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-tab="history" href="/history">
                  <i class="fas fa-history"></i>
                  Letter History
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-tab="credits" href="/credits">
                  <i class="fas fa-money-bill"></i>
                  Credits ({{ $user->credit }})
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-tab="profile" href="/profile">
                  <i class="fas fa-user-circle"></i>
                  Profile
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-link-logout" data-tab="logout" href="/logout">
                  <i class="fas fa-power-off"></i>
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </nav>

        @yield('content')
      </div>
    </div>

    <script>
      $(document).ready(function() {
        $("a[data-tab='{{ $tab }}']").addClass('active');
      });
    </script>

  </body>
</html>
