@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', ])

@section('content')
    <style>
        img{
            width: 800px;
            height: 100%;
        }
    </style>
    <h1 style="color:#222222; font-size:54px; font-family:neucha; text-align: center;">{{$photosOurClass->title}}</h1>
    <p class="text-center">
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
    <div class="card card-blog" style="max-width: 900px; margin: 50px auto">
        <div class="card-header card-header-image">

            <img class="img" src=" {{ asset($photosOurClass->preview) }}">
            <div class="card-title">
            </div>
        </div>
        <div class="card-body">


            <p class="card-description">

                {{$photosOurClass->description}}
            </p>
        <div class="text-right">
            @if ($deleteAccess)
            <form method="POST" action="{{ route('photosOurClass.destroy', $photosOurClass->id) }}">
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
    </div>

    {{--    <div class="card" style="max-width: 1600px; margin: 0 auto 100px">--}}
    {{--        <div class="card-body">--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
