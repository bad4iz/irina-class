@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'gallery', 'title' => __('Наши альбомы') , "titlePage"=>'Наша галерея',   ])

@section('content')


    <div>
        <div class="mt-2 container">
            <div class="title text-center">
                <h1 style="font-size:54px; font-family:neucha;" >Все Галереи
                    класса</h1>
                <p>
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
                @if ($addAccess)
                    <a href="{{route('gallery.create')}}" role="button" type="button" class="btn btn-success">добавить
                        галерею</a>
                @endif
                <p>
                    <span style="font-size:36px"><span style="color:#FF8C00"><strong><span style="font-family:roboto">____</span></strong></span></span>
                </p>
            </div>

            <div class="mt-12 flex-wrap flex">

                @foreach ($galleries as $gallery)
                    <div class="card card-blog m-4" style="width: 300px">
                        <div class="card-header card-header-image">

                            <img class="img" src="{{$gallery->preview}}" alt="{{$gallery->title}}">

                        </div>
                        <div class="card-body">
                            <h3 class="card-category">{{$gallery->title}}</h3>
                        </div>

                        <div class="card-footer flex-row-reverse">
                            <a href="{{route('gallery.show', $gallery->id)}}" role="button" type="button"
                               class="btn btn-success">просмотреть альбом</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>





@endsection
