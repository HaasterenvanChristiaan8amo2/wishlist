@extends('app')

@section('content')

    <div class="container text-center">
        <div class="row p-2 jumbotron mt-4">
            <div class="col-md-3 my-auto">
                <img class="card-img-top w-50" src="{{ asset('images/'. $Item['plaatje'] )}}" alt="Plaatje van het product">
            </div>
            <div class="col-md-6 my-auto">
                <h3 class="">{{ $Item['naam'] }}</h3>
                <p>{{ $Item['beschrijving'] }}</p>
            </div>

            <div class="col-md-3 my-auto">
                <h2>{{ $Item['prijs'] }}</h2>
                <a href="{{ $Item['line'] }}">Nu kopen</a>
                <p>Wens afkomstig van: {{ $Item['username'] }}</p>
            </div>
        </div>

        <form method="POST" action="/wishEdit/{{ $Item['id']}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row jumbotron">
                <div class="form-group col-6">
                    <label for="name">Naam Product</label>
                    <input type="text" class="form-control" id="name" value="{{ $Item['naam'] }}" name="naam">
                </div>

                <div class="form-group col-6">
                    <label for="link">Link naar product</label>
                    <input type="text" class="form-control" id="link" value="{{ $Item['link'] }}" name="link">
                </div>

                <div class="form-group col-12">
                    <label for="summary">Beschrijving</label>
                    <textarea class="form-control" id="summary" rows="6" name="beschrijving">{{ $Item['beschrijving'] }}</textarea>
                </div>

                <div class="form-group col-6">
                    <label for="price">Prijs</label>
                    <input type="text" class="form-control" id="price" value="{{ $Item['prijs'] }}" name="prijs">
                </div>

                <div class="form-group col-6">
                    <label for="picture">Plaatje</label>
                    <input type="file" class="form-control-file" id="picture" value="{{ $Item['plaatje'] }}" name="plaatje">
                </div>

                <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn btn-warning">
                        Wish Update
                    </button>

                    <a href="/wishDelete/{{ $Item['id'] }}" class="btn btn-danger">
                        Product Verwijderen
                    </a>
                </div>

            </div>
        </form>
    </div>

@endsection

