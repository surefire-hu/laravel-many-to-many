<form method="GET" action="{{ route('projects.index') }}">
    <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Cerca progetti..." value="{{ request('search') }}">
    </div>
    <button type="submit" class="btn btn-primary">Cerca</button>
</form>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Nome Progetto</th>
            <th>Tipologia</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{ $project->name }}</td>
                <td>{{ $project->type ? $project->type->name : 'Nessuna tipologia' }}</td>
                <td>
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">Modifica</a>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare questo progetto?');">Cancella</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
