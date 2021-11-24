<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('staradmin') }}/styleloader.css">
  </head>
  <body>
    <div class="content">
        <p>Loading ....</p>
    </div>
    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(window).on("load",function(){
          $(".loader-wrapper").fadeOut("slow");
          window.location.href = '{{url("/dashboard")}}';
        });
    </script>
  </body>
</html>
