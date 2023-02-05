<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Šunų prižiūrėjimo sistema</title>
      <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style> 
          .spalvaNavbar{
            background-image: linear-gradient(to right, #486A7C, #619BBA);
          }
          .navbar-brand{color: white!important;}
          .nav-link{color:white!important;}
          .nav-link:hover{color:#61BAA2!important;}
          .navbar-brand{
            font-family: "Dollie Script Personal Use"
          }
          .navbar-brand{font-style: italic !important;}
          .navbar-brand{font-size: 30px !important;}
          .navbar-toggler{color:white!important;}
          .navbar-toggler-icon{
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 0, 0, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
          }
          body{
            background-image: url("/image/background1.png");
          }
          .linkai{
            font-size: 22px; 
            font-family: "Franklin Gothic Demi";
            padding-right: .50rem !important;
          }
        </style>
    </head>
    <body class="antialiased">
        <header>
            <nav class="spalvaNavbar navbar sticky-top navbar-expand-lg ">
                <div class="container-fluid">
                    <a href="" class="navbar-brand font-italic">Šunų prižiūrėjimas Kaune</a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav">
                            @if (Route::has('login'))
                              <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                              @auth
                                  <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                              @else
                                  <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                              @if (Route::has('register'))
                                  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                              @endif
                              @endauth
                              </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    <main>
    </main>
    <footer>
        <div class="text-center p-3" style="background-image: linear-gradient(to right, #486A7C, #619BBA);">© 2022 Darbą atliko Pijus Černiauskas</div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>