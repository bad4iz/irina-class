@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Наша галерея') , "titlePage"=>'Наша галерея'  ])

@section('content')


    <div class="hide_line     img_square     section            transparent_ico section1158  "
         style="background-color:#ffffff;  background-image:url(/img/null.png); padding-top:80px; padding-bottom:50px;"
    >
        <h1 style="color:#222222; font-size:54px; font-family:neucha; text-align: center;">Все Галереи класса</h1>
        <div class="section_inner   all_border width1170">
            <div class="title"><p><span style="font-size:28px"><span style="color:#FF0000">★&nbsp;</span><span
                            style="color:#FF8C00">★&nbsp;</span><span style="color:#FFD700">★&nbsp;</span><span
                            style="color:#008000">★&nbsp;</span><span style="color:#00FFFF">★&nbsp;</span><span
                            style="color:#0000CD">★&nbsp;</span><span style="color:#4B0082">★</span></span></p>
                @if ($addAccess)
                <a href="{{route('gallery.create')}}" role="button" type="button" class="btn btn-success">добавить галерею</a>
                @endif
                <p>
                    <span style="font-size:36px"><span style="color:#FF8C00"><strong><span style="font-family:roboto">____</span></strong></span></span>
                </p></div>

            <div class="catalog_items count3 s200">

                @foreach ($galleries as $gallery)
                    <div class="card card-blog m-3" style="width: 300px">
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
