<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
        <title>ForEach Academy</title>

        <!-- Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!-- Styles -->
        <link href="css/app.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="app">
            <app>
            </app>
        </div>
        <!-- Cookie consent -->
        @include('cookieConsent::index')
    <script src="js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.4.3/plyr.min.js"></script>
    </body>
</html>
