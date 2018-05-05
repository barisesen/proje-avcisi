@foreach($projects as $project)
    <li class="project-card">
        <div class="project-card-inside flex space-between">
            <div class="project-image">
                <img src="{{ URL::asset('img/app2.png') }}" alt="">
            </div>
            <div class="project-info">
                <h2 class="project-name"><a href="#">{{$project->title}}</a></h2>
                <p class="project-description">{{ str_limit($project->content, $limit = 200, $end = '...') }}</p>
                <div class="project-bottom flex space-between">
                    <div class="project-category">
                        <a class="category-chip" href="kategori/{{$project->category->slug}}"><i class="fas fa-columns"></i> {{$project->category->name}}</a>
                    </div>
                    <div class="card-buttons flex flex-end">
                        <form class="" action="" method="POST">
                            <button type="button" class="button card-button" name="button"><i class="far fa-comment"></i>&nbsp Yorumla ({{$project->comments->count()}})</button>
                        </form>
                        <form class="" action="" method="POST">
                            <button type="button" class="button card-button" name="button"><i class="fas fa-fire"></i>&nbsp Ateşle ({{$project->likes->count()}})</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </li>
@endforeach