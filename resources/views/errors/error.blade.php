<title>{{ env('APP_NAME') }}</title>

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<div class="container-fluid h-100 bg-dark text-center row p-5 m-auto">
    <div class="col-md-8 d-flex">
        <img class="img-fluid my-auto w-100" src="https://media1.tenor.com/images/3140c03ae36e87ae948c95e973849625/tenor.gif?itemid=12807004" alt="waifugif">
    </div>

    <div class="col-md-4 my-auto">
        <h1 class="text-danger display-2">Error code: {{ $code }}</h1>
        <h1 class="text-white">Error message: {{ $message }}</h1>
        <a href="/" class="btn btn-primary">Go back Home</a>
    </div>
</div>

