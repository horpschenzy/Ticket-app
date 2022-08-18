<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Ticket System</title>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font.css') }}" rel="stylesheet">
	<script src="{{ asset('js/vue.min.js') }}"> </script>
	<script src="{{ asset('js/axios.min.js') }}"> </script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      .container {
        max-width: 960px;
    }
    </style>
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h2>Tickets</h2>
      <p class="lead">Welcome to Ticket System.</p>
    </div>

    <div class="row g-5" id="ticket">
      <div class="col-md-4 col-lg-4"></div>
            <div class="col-md-4 col-lg-4">
            
                <a href="{{ route('book-session')}}" class="w-100 btn btn-primary btn-lg" style="">Book A Session</a>
            </div>
        <div class="col-md-4 col-lg-4"></div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2022 Ticket System</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/toastr.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
