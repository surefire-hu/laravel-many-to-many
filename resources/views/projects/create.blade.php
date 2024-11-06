
<div class="form-group">
    <label for="type_id">Tipologia</label>
    <select name="type_id" id="type_id" class="form-control">
        <option value="">Seleziona una tipologia</option>
        @foreach($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="technologies">Tecnologie</label>
    <select name="technologies[]" id="technologies" class="form-control" multiple>
        @foreach($technologies as $technology)
            <option value="{{ $technology->id }}">{{ $technology->name }}</option>
        @endforeach
    </select>
</div>
