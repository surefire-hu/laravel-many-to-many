@if($project->type)
    <div>
        <strong>Tipologia:</strong> {{ $project->type->name }}
    </div>
@endif

@if($project->technologies->isNotEmpty())
    <div>
        <strong>Tecnologie utilizzate:</strong>
        <ul>
            @foreach($project->technologies as $technology)
                <li>{{ $technology->name }}</li>
            @endforeach
        </ul>
    </div>
@endif

