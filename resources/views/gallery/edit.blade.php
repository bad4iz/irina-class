@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', ])

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <style>
        img {
            width: 800px;
            height: 100%;
        }
    </style>
    <h1 style="color:#222222; font-size:54px; font-family:neucha; text-align: center;">{{$gallery->title}}</h1>
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

            <img class="img" src=" {{ asset($gallery->preview) }}">
            <div class="card-title">
            </div>
        </div>
        <div class="card-body">


            <p class="card-description">

                {{$gallery->description}}
            </p>
            <div class="text-right">
                @if ($deleteAccess)
                    <form method="POST" action="{{ route('gallery.destroy', $gallery->id) }}">
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
        <div class="row">
            @foreach ($gallery->photos as $photo)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top"
                             src="{{ asset($photo->image) }}"
                             alt="{{$photo->data}}">
                        <div class="card-body">
                            <p class="card-text">{{$photo->description}}</p>
                        </div>
                        <div class="text-right">
                            @if ($deleteAccess)
                                <form method="POST" action="{{ route('photo.destroy', $photo->id) }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button role="button" type="submit"
                                            class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 m-l-10"
                                            value="Удалить">Удалить фотографию
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card mx-auto" style="max-width: 1200px; ">
            <div class="card-header">
                <h4 class="card-title">Добавление фотографий</h4>
                <p class="category">заполните поля</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('photo.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="number" hidden name="gallery_id" value="{{$gallery->id}}">
                    <div class="">
                        <label for="file">добавьте изображение</label>
                        <input id="file" type="file" name="image">
                    </div>


                    <div class="form-group ">
                        <label for="data">дата</label>
                        <input type="date" value="{{date('Y-m-d') }}" name="date" id="data" class="form-control">
                    </div>

                    <div class="form-group ">
                        <label for="description">Описание</label>
                        <textarea id="description" class="form-control" name="description" maxlength="250"
                                  placeholder="введите описание галереи"></textarea>
                    </div>

                    <div class="text-right">

                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>


        </div>

    </div>

    {{--    <div class="card" style="max-width: 1600px; margin: 0 auto 100px">--}}
    {{--        <div class="card-body">--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
