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
            <h4 class="card-title">Создание галереи</h4>
            <p class="category">заполните поля</p>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <label for="file">Добавьте обложку для альбома</label>
                    <input id="file" type="file" name="preview">
                </div>


                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input maxlength="50" type="text" name="title" id="title" class="form-control"
                           placeholder="введите текст заголовока">
                </div>

                <div class="form-group ">
                    <label for="data">дата события</label>
                    <input type="date" value="{{date('Y-m-d') }}" name="date" id="data" class="form-control">
                </div>

                <div class="form-group ">
                    <label for="description">Описание галереи</label>
                    <textarea id="description" class="form-control" name="description" maxlength="250"
                              placeholder="введите описание галереи"></textarea>
                </div>




                <div class="text-right">

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>


    </div>
@endsection
