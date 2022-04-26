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

body{
	background-image: url("/image/background1.png");
}
</style>
<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>
</x-app-layout>
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
<div>
  <div class="d-flex justify-content-center">
    <div class="col-md-10">
<h3 class="my-3 text-center" style="font-family: Impact; font-size: 50px; color:#5F9EA0; ">Profilis</h3>
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
  <form action="/add_dog_care" method="POST" class="row g-3">
    @csrf
    <div class="col-md-6">
      <label for="vardas" class="form-label" style="font-family: Impact; font-size: 20px;">Vardas</label>
      <input value="{{ old('vardas') }}" type="text" class="form-control" id="vardas" name="vardas">
    </div>
    <div class="col-md-6">
      <label for="pavarde" class="form-label" style="font-family: Impact; font-size: 20px;">Pavardė</label>
      <input value="{{ old('pavarde') }}" type="text" class="form-control" id="pavarde" name="pavarde">
    </div>
    <div class="col-md-6">
      <label for="telefono_numeris" class="form-label" style="font-family: Impact; font-size: 20px;">Telefono numeris</label>
      <input value="{{ old('telefono_numeris') }}" type="text" class="form-control" id="telefono_numeris" name="telefono_numeris">
    </div>
    <div class="col-md-6">
      <label for="adresas" class="form-label" style="font-family: Impact; font-size: 20px;">Adresas</label>
      <input value="{{ old('adresas') }}" type="text" class="form-control" id="adresas" name="adresas">
    </div>
    <h3 class="my-3 text-center" style="font-family: Impact; font-size: 50px; color:#5F9EA0;">Gyvūno duomenys</h3>
    <div class="col-md-6">
      <label for="suns_veisle" class="form-label" style="font-family: Impact; font-size: 20px;">Šuns veislė</label>
      <input value="{{ old('suns_veisle') }}" type="text" class="form-control" id="suns_veisle" name="suns_veisle">
    </div>
    <div class="col-md-6">
      <label for="suns_amzius" class="form-label" style="font-family: Impact; font-size: 20px;">Šuns amžius</label>
      <input value="{{ old('suns_amzius') }}" type="text" class="form-control" id="suns_amzius" name="suns_amzius">
    </div>
    <div class="col-md-6">
      <label for="suns_svoris" class="form-label" style="font-family: Impact; font-size: 20px;">Šuns svoris (kg)</label>
      <input value="{{ old('suns_svoris') }}" type="text" class="form-control" id="suns_svoris" name="suns_svoris">
    </div>
    <div class="col-md-6">
      <label for="draugiskas" class="form-label" style="font-family: Impact; font-size: 20px;">Ar draugiškas su žmonėmis ir su kitais šunimis?</label>
      <input value="{{ old('draugiskas') }}" type="text" class="form-control" id="draugiskas" name="draugiskas">
    </div>
    <div class="col-md-6">
      <label for="alergiskas" class="form-label" style="font-family: Impact; font-size: 20px;">Ar alergiškas kam nors?</label>
      <input value="{{ old('alergiskas') }}" type="text" class="form-control" id="alergiskas" name="alergiskas">
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 60px;">
      <button type="submit" class="btn btn-outline-success">Išsaugoti</button>
      @if (auth()->user()->admin)
      <a href="{{ url('/dog_care') }}" class="btn btn-success">Redaguoti</a>
      @endif
    </div>
  </form>
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