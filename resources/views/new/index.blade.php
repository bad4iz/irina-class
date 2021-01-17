@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Все Новости класса') , "titlePage"=>'Все Новости класса', 'activePage' => 'new', ])

@section('content')


    <div>
        <div class="mt-2 container">
            <div class="title text-center">
                <h1>Все Новости класса</h1>
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

                @foreach ($news as $oneNews)
                    <x-news :news="$oneNews"/>
                @endforeach

            </div>
        </div>
    </div>





@endsection
