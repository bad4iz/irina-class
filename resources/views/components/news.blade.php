<div class="card card-blog m-4" style="max-width: 300px">
    <div class="card-header card-header-image">

        <img class="img" src="{{$news->preview}}" alt="{{$news->title}}">

    </div>
    <div class="card-body">
        <h2 class="card-category">{{$news->title}}</h2>
        <p class="card-description">
            {{$news->intro}}
        </p>
    </div>


    <div class="card-footer flex-row-reverse">
        <a href="{{route('new.show', $news->id)}}" role="button" type="button"
           class="btn btn-success">Читать далее</a>
    </div>
</div>
