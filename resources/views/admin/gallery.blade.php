@extends('admin.app', ['activePage' => 'gallery', ])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header flex justify-content-between">
                            <div>
                                <h4 class="card-title ">Галерея класса</h4>
                                <p class="card-category">здесь показаны галереи класса которые вы добавили</p>
                            </div>
                            <a href="{{route('gallery.create')}}" role="button" type="button" class="btn btn-success">
                                добавить галерею
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>#</th>
                                    <th>Заголовок</th>
                                    <th>Дата события</th>
                                    <th>Превью</th>
                                    <th>Описание</th>
                                    <th>Автор</th>
                                    <th>Разрешено к публикации</th>
                                    <th>Дата создания</th>
                                    <th>Дата обноления</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach ($galleries as $gallery)
                                        <tr>
                                            <td>
                                                {{$gallery->id}}
                                            </td>
                                            <td>
                                                {{$gallery->title}}
                                            </td>
                                            <td>
                                                {{$gallery->date}}
                                            </td>
                                            <td>
                                                <img class="img" style="max-width: 50px" src="{{ asset($gallery->preview) }}" alt="{{$gallery->title}}">
                                            </td>
                                            <td>
                                                {{$gallery->description}}
                                            </td>
                                            <td>
                                                {{ $gallery->author->name}}
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" disabled type="checkbox"
                                                               checked="{{$gallery->is_moderation}}">
                                                        <span class="form-check-sign">
                                                          <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>

                                            </td>
                                            <td>
                                                {{$gallery->created_at}}
                                            </td>
                                            <td>
                                                {{$gallery->updated_at }}
                                            </td>
                                            <td>
                                                <a href="{{route('gallery.edit', $gallery)}}" role="button" type="button"
                                                   class="btn btn-success">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
