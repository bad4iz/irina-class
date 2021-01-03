@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', ])

@section('content')
    <style>
        img {
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
    @if ($changeAccess)
        <p class="text-center">

            <a href="{{route('photosOurClass.edit', $photosOurClass->id)}}" role="button" type="button"
               class="btn btn-success ">редактировать</a>
        </p>
    @endif
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
        </div>
    </div>
@endsection
