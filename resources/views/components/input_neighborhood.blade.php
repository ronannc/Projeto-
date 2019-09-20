<div class="form-group">
    <label for="neighborhood">Bairro</label>
    <input type="text"
           class="form-control"
           name="neighborhood"
           id="neighborhood"
           placeholder="Bairro"
           value="{{ old('neighborhood') ?? $data['neighborhood'] ?? null }}">
</div>
