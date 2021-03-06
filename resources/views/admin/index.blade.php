@extends('admin.app', ['activePage' => 'index', ])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header flex justify-content-between">
                            <div>
                                <h4 class="card-title ">Новости класса</h4>
                                <p class="card-category">здесь преведены новости класса которые вы добавляли</p>
                            </div>
                            <a href="{{route('new.create')}}" role="button" type="button" class="btn btn-success">
                                добавить новость
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Заголовок</th>
                                    <th>Превью</th>
                                    <th>Интро</th>
                                    <th>Автор</th>
                                    <th>Опубликовано</th>
                                    <th>Дата события</th>
                                    <th>Дата создания</th>
                                    <th>Дата обноления</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach ($news as $new)
                                        <tr>
                                            <td>
                                                {{$new->id}}
                                            </td>

                                            <td>
                                                <a class="text-capitalize btn-link" href="{{ route('new.show', $new->id) }}">
                                                {{$new->title}}
                                                    </a>
                                            </td>

                                            <td>
                                                <img class="img" style="max-width: 50px" src="{{ asset($new->preview) }}" alt="{{$new->title}}">
                                            </td>
                                            <td style="max-width: 300px">
                                                {{$new->intro}}
                                            </td>
                                            <td>
                                                {{ $new->author->name}}
                                            </td>
                                            <td style="max-width: 50px;">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" disabled type="checkbox"
                                                               checked="{{$new->is_moderation}}">
                                                        <span class="form-check-sign">
                                                          <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>

                                            </td>
                                            <td>
                                                {{$new->event_date}}
                                            </td>
                                            <td>
                                                {{$new->created_at}}
                                            </td>
                                            <td>
                                                {{$new->updated_at }}
                                            </td>
                                            <td>
                                                <a href="{{route('new.edit', $new)}}" role="button" type="button"
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
