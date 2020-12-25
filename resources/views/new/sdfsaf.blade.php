<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    @trixassets

</head>
<body>
<div class=" position-ref full-height">
    <div class="content">
        @foreach($news as $new)
        <h1>{{ $new->id }}</h1>
        <h1>{{ $new->title }}</h1>

        {{--        --}}
        {{--            @trix($new, 'content')--}}

        {{--            {!! $new->trix('content') !!}--}}

        {{--            {!! app('laravel-trix')->make($new, 'content') !!}--}}
        {{ asset($new->preview) }}
        <img src="{{$new->preview}}" alt="{{ $new->title }}" width="500" height="600">
        <img src="{{ asset($new->preview) }}" alt="{{ $new->title }}" width="500" height="600">
        <div>{{ $new->title }}</div>
        <div>{{ $new->title }}</div>
        <div>{{ $new->title }}</div>
        {{--            @trix($new, 'content', ['disk' => 'local'])--}}
        {!! $new->trixRichText->first()->content !!}


        <form method="POST" action="{{ route('new.destroy', $new->id) }}">
            @csrf
            {{ method_field('DELETE') }}
            <button role="button" type="submit"
                    class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 m-l-10"
                    value="Удалить">Удалить
            </button>
        </form>
        <hr><br>
        @endforeach
    </div>
</div>
</body>
</html>
