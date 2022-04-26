@extends('layouts.main')

@section('content')
  <h3 class="my-3 text-center">Ar tikrai norite ištrinti profili?</h3>
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{$Dog_care->name }}</h5>
      <p class="card-text">{{$Dog_care->description}}</p>
      <a href="/" class="btn btn-primary">No</a>
      <a href="/dog_cares/remove/{{$Dog_care->id}}" class="btn btn-primary">Yes</a>
      </div>
  </div>
  @endsection