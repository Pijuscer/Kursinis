<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
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
    <body class="antialiased">
        <nav class="spalvaNavbar navbar sticky-top navbar-expand-lg">
            <div class="container-fluid">
                <a href="{{ url('/dashboard') }}" class="navbar-brand font-italic">Šunų prižiūrėjimas Kaune</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav navbar-collapse justify-content-end">
                      <a href="{{ url('/add_dog_care') }}" class="linkai nav-link">Profilis</a>
                      @if (auth()->user()->admin)
                  <a href="{{ url('/working_days') }}" class="linkai nav-link">Laisvumas</a>
                  @else
                  @endif
                <a href="{{ url('/cares') }}" class="linkai nav-link">Paslaugos</a>
                <a href="{{ url('/prices') }}" class="linkai nav-link">Kainos</a>
                <a href="{{ url('/about') }}" class="linkai nav-link">Apie</a>
                <a href="{{ url('/orders') }}" class="linkai nav-link">Užsakymai</a>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="{{ route('profile.show') }}" >Nustatymai</a></li>
                              <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <button type="submit" class="dropdown-item" style="border: none; background-color: Transparent; " >Atsijungti</button>
                            </form>
                            </ul>
                          </div> 
                    </div>
                </div>
            </div>
        </nav>
        <main>
            <div class="container mt-4">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="/image/foto.png" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="/image/foto2.png" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="/image/foto3.png" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                <div class="d-flex justify-content-center">
                <div class="col-md-10">
                    <h1 class="text-center p-4" style="font-family: Impact; font-size: 45px; margin-top: 40px; color:#5F9EA0;">Šunų prižiūrėjimas Kaune!</h1>
                    <p style="font-size: 22px; font-family: Times New Roman";>Sveiki, esu Pijus Černiauskas šio puslapio įkūrėjas bei asmuo, kuris prižiūrės Jūsų augintinį. Turiu daugiau nei 5 metų patirties šiame darbe. Todėl galiu Jums pasiūlyti patikimą bei atsakingą šunų priežiūrą. Gyvenu didelėje teritoryje esančiame name, kuriame šunys turės daug laisvės ne tik namo viduje, bet ir lauke. Galiu Jūsų šunis prižiūrėti ne tik savo namuose, bet ir atvykti į Jūsų namus esančius Kaune. Jums pažadu savo kaip žmogaus sąžiningumą, nuoširdumą bei rūpestingumą Jūsų šuns priežiūrai, kad šuo nepajaustu, jog savininkų nėra šalia.</p>
                </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="text-center p-3" style="background-image: linear-gradient(to right, #486A7C, #619BBA); margin-top: 40px;">© 2022 Darbą atliko Pijus Černiauskas</div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        </body>
    </html>

