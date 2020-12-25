@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Все Новости класса') , "titlePage"=>'Все Новости класса'  ])

@section('content')


    <div class="hide_line     img_square     section            transparent_ico section1158  "
         style="background-color:#ffffff;  background-image:url(/img/null.png); padding-top:80px; padding-bottom:50px;"
    >

        <h1 style="color:#222222; font-size:54px; font-family:neucha; text-align: center;">Все Новости класса</h1>

        <div class="section_inner   all_border width1170">
            <div class="title"><p><span style="font-size:28px"><span style="color:#FF0000">★&nbsp;</span><span
                            style="color:#FF8C00">★&nbsp;</span><span style="color:#FFD700">★&nbsp;</span><span
                            style="color:#008000">★&nbsp;</span><span style="color:#00FFFF">★&nbsp;</span><span
                            style="color:#0000CD">★&nbsp;</span><span style="color:#4B0082">★</span></span></p>

                </p>
                <p><span style="font-size:36px"><span style="color:#FF8C00"><strong><span style="font-family:roboto">____</span></strong></span></span>
                </p></div>
            <div class="sub_title"><p><span style="font-size:22px">В нашем классе 36 учеников: 19 девочек и 17 мальчиков.</span><br>
                </p></div>
            <div class="catalog_items count3 s200">

                @foreach ($news as $new)
                    <div class="arr1 ">
                        <div class="col_4">
                            <div class="col_bg" style="opacity:0.5; background: #f8f8f8;"></div>


                            <div class="images">
                                <div data-link="" class="image1  s200   show_extra_info ">
                                    <img data-lazy="1" src="{{$new->preview}}" alt="{{$new->title}}">
                                </div>

                            </div>

                            <div class="title1"><strong>{{$new->title}}</strong></div>
                            <div class="txt1">
                            <span style="color:#000000">
                              {{$new->intro}}
                            </span>
                                <div>
                                    <div><span style="color:#000000"></span><span style="color:#000000"><br></span>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('new.show', $new->id)}}" class="btn1" data-hcolor="#24796b"
                               style="color:#24796b;  border-radius: 0;         ">Читать далее</a>


                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>





@endsection
