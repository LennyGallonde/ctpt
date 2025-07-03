<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Club de Tennis et Squash du Plessis Trévise</title>
    <meta name="description" content="club tennis squash Plessis Trévise sport 94420 stage">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
    <div class="min-vh-100">
        @include("fragment.navbarre")
                  @if (session('notif'))
         <div id="notif"
            class=" m-4 fixed-bottom rounded-pill bg-{{session('notifColor')}} border border-1 border-dark mx-2 my-3 col-6 col-lg-3">
            <div class="fs-5 col align-center m-2">
                <i class="bi bi-bell px-2"></i>
                {{ session('notif') }}
            </div>
        </div>
          @endif
        <main>@yield("content")</main>
    </div>
    @include("fragment.footer")
</body>
</html>
