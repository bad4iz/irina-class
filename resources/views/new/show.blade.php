@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => $new->title])

@section('meta')
    <meta property="og:title" content="{{$new->title}}"/>
    <meta property="og:type" content="article"/>
    {{--    <meta property="og:url" content="//www.imdb.com/title/tt0117500/" />--}}
    <meta property="og:image" content="{{ asset($new->preview) }}"/>
    <meta property="og:image:width" content="300"/>
    <meta property="og:image:height" content="300"/>
    <meta property="og:article:author" content="{{ asset($new->author->name) }}"/>
@endsection

@section('content')
    <style>
        img {
            margin: 0 auto;
        }

        figcaption {
            text-align: center;
        }
    </style>
    <h1 class="text-center mt-5">{{$new->title}}   <a id="viber_share-{{$new->id}}" role="button" type="button"
                                                      class="btn btn-social btn-just-icon btn-round"><img src="{{asset('img/thumb_icon_purple_normal.png')}}"
                                                                                                          alt="" title="поделиться новостью в вибере"></a></h1>
    <p class="text-center m-4">
        <span style="font-size:28px">
            <span style="color:#FF0000">★&nbsp;</span>
            <span style="color:#FF8C00">★&nbsp;</span>
            <span style="color:#FFD700">★&nbsp;</span>
            <span style="color:#008000">★&nbsp;</span>
            <span style="color:#00FFFF">★&nbsp;</span>
            <span style="color:#0000CD">★&nbsp;</span>
            <span style="color:#4B0082">★</span>
        </span>
    </p>

    <div class="card card-blog mx-auto mt-14" style="max-width: 900px; ">
        <div class="card-header card-header-image">

            <img class="img" src=" {{ asset($new->preview) }}">
            <div class="card-title">
            </div>
        </div>
        <div class="card-body">

            <h6 class="card-category "> {{$new->intro}}</h6>

            <p class="card-description">

                {!! $new->trixRichText->first()->content !!}
            </p>
            <div class="text-right">
                @if ($deleteAccess)
                    <form method="POST" action="{{ route('new.destroy', $new->id) }}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button role="button" type="submit"
                                class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 m-l-10"
                                value="Удалить">Удалить
                        </button>
                    </form>
                @endif
            </div>
        </div>
        <div class="card-footer">
            <a id="viber_share-{{$new->id}}" role="button" type="button"
               class="btn btn-social btn-just-icon btn-round"><img src="{{asset('img/thumb_icon_purple_normal.png')}}"
                                                                   alt="" title="поделиться новостью в вибере"></a>
        </div>
    </div>

    {{--    <div class="card" style="max-width: 1600px; margin: 0 auto 100px">--}}
    {{--        <div class="card-body">--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <script>
        document.getElementById("viber_share-{{$new->id}}")
            .setAttribute('href', 'viber://forward?text=' + encodeURIComponent('{{$new->intro}}' + ' ' + '{{ route('new.show', $new->id) }}'));
    </script>

@endsection
