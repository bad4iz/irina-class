<style>
    /*.card:hover .img-hover {*/
    /*    transform: translate3d(0, -50px, 0);*/

    /*}*/

    /*.img-hover {*/
    /*    transition: all 300ms cubic-bezier(0.34, 1.61, 0.7, 1);*/
    /*}*/
</style>
<div class="card card-blog m-4" style="max-width: 300px">
    <div class="card-header card-header-image">

        <img class="img img-hover" src="{{$news->preview}}" alt="{{$news->title}}">

    </div>
    <div class="card-body">
        <div class="card-actions">
        </div>
        <h3 class="card-category">{{$news->title}}</h3>
        <p class="card-description">
            {{$news->intro}}
        </p>
    </div>

    <div class="card-footer justify-content-between">
            <a id="viber_share-{{$news->id}}" role="button" type="button"
               class="btn btn-social btn-just-icon btn-round"><img src="{{asset('img/thumb_icon_purple_normal.png')}}"
                                                                   alt="" title="поделиться новостью в вибере"></a>

        <a href="{{route('new.show', $news->id)}}" role="button" type="button"
           class="btn btn-success">Читать далее</a>
    </div>
</div>
<script>
    document.getElementById("viber_share-{{$news->id}}")
        .setAttribute('href', 'viber://forward?text=' + encodeURIComponent('{{$news->intro}}' + ' ' + '{{ route('new.show', $news->id) }}' ));
</script>
