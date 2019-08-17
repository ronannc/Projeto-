<div class="form-group">
    <label for="description">Descrição</label>
    <input type="text"
           class="form-control"
           name="description"
           id="description"
           placeholder="Descricao"
           value="{{ old('description') ?? $data['description'] ?? null }}">
</div>
