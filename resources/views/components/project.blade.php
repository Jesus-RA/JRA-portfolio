<div class="card">
    <div class="card-header text-center">
    <img src="{{$project->images}}" alt="">
    </div>
    
    <div class="card-body">
        <h4>{{$project->name}}</h4>
        <p>
            <span>Description: </span>{{$project->description}}
        </p>
        <p>
            <span>Technologies: </span>{{$project->technologies}}
        </p>
    </div>
</div>