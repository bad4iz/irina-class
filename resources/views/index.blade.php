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
        @foreach($articles as $article)
            <h1>{{ $article->id }}</h1>
            <h1>{{ $article->title }}</h1>

{{--        --}}
{{--            @trix($article, 'content')--}}

{{--            {!! $article->trix('content') !!}--}}

{{--            {!! app('laravel-trix')->make($article, 'content') !!}--}}
        {{ asset($article->preview) }}
            <img src="{{$article->preview}}" alt="{{ $article->title }}" width="500" height="600">
            <img src="{{ asset($article->preview) }}" alt="{{ $article->title }}" width="500" height="600">
            <div>{{ $article->title }}</div>
            <div>{{ $article->title }}</div>
            <div>{{ $article->title }}</div>
{{--            @trix($article, 'content', ['disk' => 'local'])--}}
            {!! $article->trixRichText->first()->content !!}


            <form    method="POST" action="{{ route('destroy', ['id'=>$article->id]) }}">
                @csrf
                {{ method_field('DELETE') }}
                <button  role="button" type="submit"
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
