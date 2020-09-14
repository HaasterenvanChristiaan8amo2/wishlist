@extends('app')

@section('content')

    <div class="container text-center">
        @if(empty($WishItem))
            <div class="row">
                <h1 class="col-12 display-4">Er zijn nog geen wensen gezet op deze site</h1>
                <div class="col-md-12 d-flex">
                    <img class="img-fluid my-auto w-100" src="{{ asset('images/noWish.gif') }}" alt="Christmas Party">
                </div>

                <div class="col-md-12 my-auto">
                    <a href="/createWish" class="mt-3">
                        <h1>Klik hier om een wens toe te voegen</h1>
                    </a>
                </div>
            </div>
        @else
            @foreach($WishItem as $Item)
                <div class="row p-2 jumbotron mt-2">
                    <div class="col-md-3 my-auto">
                        <img class="card-img-top w-75" src="{{ asset('images/'. $Item->plaatje )}}" alt="Plaatje van het product">
                    </div>

                    <div class="col-md-6 my-auto">
                        <h3 class="">{{ $Item->naam }}</h3>
                        <p>{{ $Item->beschrijving }}</p>

                        @if(Auth::user())
                            @if(Auth::User()->name == $Item->username || Auth::User()->admin == 1)
                                <a href="/wishEdit/{{ $Item->id }}" class="btn btn-warning">Product Aanpassen</a>
                                <a href="/wishDelete/{{ $Item->id }}" class="btn btn-danger">Product Verwijderen</a>
                            @endif
                        @endif
                    </div>

                    <div class="col-md-3 my-auto">
                        <h2>{{ $Item->prijs }}</h2>
                        <a href="{{ $Item->link }}" target="_blank">Nu kopen</a>
                        <p>Wens afkomstig van: {{ $Item->username }}</p>
                    </div>
                </div>
            @endforeach
       @endif
    </div>

@endsection
