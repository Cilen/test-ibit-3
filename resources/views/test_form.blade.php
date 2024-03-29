<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Calculator based on emojis</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="{{ asset('js/app.js') }}" defer></script>

        <meta name="csrf-token" content="{{ csrf_token() }}">




        <!-- Styles -->
        <style>

        </style>
    </head>
    <body>
        <h2>Basic calculation</h2>
        <div id="app">

            <calculator-form></calculator-form>

        </div>
    </body>
</html>
