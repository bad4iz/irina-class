@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Все Новости класса') , "titlePage"=>'Все Новости класса', 'activePage' => 'new', ])

@section('content')


    <div>
        <div class="mt-2 container">
            <div class="title text-center">
                <h1 style="font-size:54px; font-family: neucha;" >Все Новости класса</h1>
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
                    <a href="{{route('new.create')}}" role="button" type="button" class="btn btn-success">добавить
                        новость</a>
                @endif
                <p>
                    <span style="font-size:36px"><span style="color:#FF8C00"><strong><span style="font-family:roboto">____</span></strong></span></span>
                </p>
            </div>


            <div class="sub_title text-center">
                <h4 style="font-size:22px">В нашем классе 36 учеников: 19 девочек и 17 мальчиков.</h4>

            </div>

            <div class="mt-12 flex-wrap flex">

                @foreach ($news as $new)
                    <div class="card card-blog m-4" style="max-width: 300px">
                        <div class="card-header card-header-image">

                            <img class="img" src="{{$new->preview}}" alt="{{$new->title}}">

                        </div>
                        <div class="card-body">
                            <h3 class="card-category">{{$new->title}}</h3>
                            <p class="card-description">
                                {{$new->intro}}
                            </p>
                        </div>

                        <div class="card-footer flex-row-reverse">
                            <a href="{{route('new.show', $new->id)}}" role="button" type="button"
                               class="btn btn-success">Читать далее</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>





@endsection
