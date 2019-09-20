<div class="form-group">
    <label for="start">Inicio</label>
    <input type="date"
           class="form-control"
           max="9999-12-31"
           name="start"
           id="start"
           placeholder="Inicio"
           value ="{{ old('start') ?? $data['start'] ?? null }}"
    >
</div>
