<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    @trixassets
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class=" position-ref full-height">
    <form method="POST" action="{{ route('new.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="title">Вводный текст</label><br/>
        <input type="file" name="preview"><br/>

        <label for="title">Заголовок</label><br/>
        <input type="text" name="title" id="title"><br/>

        <label for="title">дата события</label><br/>
        <input type="date" value="{{date('Y-m-d') }}" name="event_date" id="title"><br/>

        <label for="title">Вводный текст</label><br/>
        <textarea name="intro" id="title"></textarea><br/>

        @trix(\App\News::class, 'content')
        <input type="submit">
    </form>


</div>
</body>
</html>
