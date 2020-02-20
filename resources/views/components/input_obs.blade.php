<div class="form-group">
    <label for="obs">Observações</label>
    <input type="text"
           class="form-control"
           name="obs"
           id="obs"
           placeholder="Observações"
           value="{{ old('obs') ?? $data['obs'] ?? null }}">
</div>
