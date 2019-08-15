<div class="form-group">
    <label for="description">Descrição</label>
    <input type="text" class="form-control" name="description" id="input_description" placeholder="Descricao"
           value="{{ old('description') ?? $extraData['description'] ?? null }}">
</div>
