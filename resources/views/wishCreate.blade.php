@extends('app')

@section('content')

    <div class="container text-center jumbotron">
        <form method="POST" action="/wishCreate" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <div class="form-group col-6">
                    <label for="name">Naam Product</label>
                    <input type="text" class="form-control" id="name" placeholder="One Plus 8T" name="naam">
                </div>

                <div class="form-group col-6">
                    <label for="link">Link naar product</label>
                    <input type="text" class="form-control" id="link" placeholder="http://bol.com" name="link">
                </div>

                <div class="form-group col-12">
                    <label for="summary">Beschrijving</label>
                    <textarea class="form-control" id="summary" rows="6" name="beschrijving"></textarea>
                </div>

                <div class="form-group col-6">
                    <label for="price">Prijs</label>
                    <input type="text" class="form-control" id="price" placeholder="€34,39" name="prijs">
                </div>

                <div class="form-group col-6">
                    <label for="picture">Plaatje</label>
                    <input type="file" class="form-control-file" id="picture" name="plaatje">
                </div>

                <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Wish Create
                    </button>
                </div>

            </div>
        </form>
    </div>

@endsection

