
<div class="form-group">
    <label for="type_id">Tipologia</label>
    <select name="type_id" id="type_id" class="form-control">
        <option value="">Seleziona una tipologia</option>
        @foreach($types as $type)
            <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>
                {{ $type->name }}
            </option>
        @endforeach
    </select>
</div>
