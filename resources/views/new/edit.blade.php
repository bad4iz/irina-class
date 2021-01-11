@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Создание новости')   ])

@section('content')

    @trixassets

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card mx-auto" style="max-width: 1200px; ">
        <div class="card-header">
            <h1 class="card-title">Обновление новости</h1>
            <p class="category">заполните поля</p>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('new.update', $new) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="card-header card-header-image">
                    <img class="img" style="max-width: 300px" src=" {{ asset($new->preview) }}">

                </div>

                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input value="{{$new->title}}" maxlength="50" type="text" name="title" id="title"
                           class="form-control"
                           placeholder="введите текст заголовока">
                </div>

                <div class="form-group ">
                    <label for="data">дата события</label>
                    <input value="{{$new->event_date}}" type="date" name="event_date" id="data" class="form-control">
                </div>

                <div class="form-group ">
                    <label for="intro">Вводный текст</label>
                    <textarea id="intro" class="form-control" name="intro" maxlength="250"
                              placeholder="введите вводный текст ">{{$new->intro}}</textarea>
                </div>

                <div class="form-group ">
                    <label for="">Статья</label>
                    @trix($new, 'content')
                </div>

                <div class="text-right">

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>


    </div>
@endsection
