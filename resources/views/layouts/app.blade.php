<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description"
          content="Сайт 2 В класса школы Нового Века">
    <meta name="Keywords"
          content="2 В, школы Нового Века, школа Нового Века, для детей, школа, шурова гора, новый век, портал школы Нового века">

    <title>{{ isset($title) ? $title :  config('app.name', 'Сайт 2 В класса школы Нового Века') }}</title>

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- CSS Files -->
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet"/>


    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet"/>


    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" type="text/css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Audiowide&family=Comfortaa:wght@300;400;700&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cormorant+Infant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cormorant+SC:wght@300;400;500;600;700&family=Cormorant+Unicase:wght@300;400;500;600;700&family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&family=El+Messiri:wght@400;500;600;700&family=Lobster&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Neucha&family=Open+Sans+Condensed:ital,wght@0,300;0,700;1,300&family=PT+Sans+Narrow:wght@400;700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Poiret+One&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ruslan+Display&family=Russo+One&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
          type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"
          type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" type="text/css">
    <link rel="stylesheet" href="http://132245.lp.tobiz.net/css/ion.rangeSlider.min.css" type="text/css">

    <link href="{{ asset('css/sass/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>


<body class="{{ $class ?? '' }}">
@include('layouts.navbars.header')

@yield('content')
@include('layouts.footer')

@stack('js')
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
